<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEscortMail;
use App\Models\Escort;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class EscortsAuthController extends Controller
{
    //todo: Register Escort
    public function escort_register_form()
    {
        return view("user-escort.register");
    }
    public function escort_register_form_submit(Request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|unique:escorts',
            'email' => 'required|email|unique:escorts',
            'phone_number' => 'required',
            'type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $escort = new Escort();
        $escort->nickname = $validated['nickname'];
        $escort->email = $validated['email'];
        $escort->password = Hash::make($validated['password']);
        $escort->phone_number = $validated['phone_number'];
        $escort->type = $validated['type'];
        $escort->address = $validated['address'];
        $escort->city = $validated['city'];
        $escort->save();

        // Send verification email
        $escort->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account.');
    }

    public function escort_login_form(Request $request)
    {
        return view('user-escort.login');
    }

    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Check if the credentials are correct
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('escort')->attempt($credentials)) {
            $escort = Auth::guard('escort')->user();

            // Check if the user's email is verified
            if (is_null($escort->email_verified_at)) {
                // If email is not verified, log the user out and redirect back with an error
                Auth::guard('escort')->logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Your email address is not verified. Please verify your email first.',
                ])->withInput();
            }

            // If email is verified, proceed with login
            if ($remember) {
                setcookie('email', $request->email, time() + 3600 * 24 * 5);
                setcookie('password', $request->password, time() + 3600 * 24 * 5);
            }

            return redirect()->route('escorts.profile', $escort->id)->with('success', 'Login successfully!');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }


    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('escorts')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ?  redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function verifyEscortEmail(Request $request)
    {
        $escort = Escort::findOrFail($request->route('id'));

        if (! hash_equals((string) $request->route('hash'), sha1($escort->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($escort->hasVerifiedEmail()) {
            return redirect('/login')->with('success', 'Email already verified.');
        }

        if ($escort->markEmailAsVerified()) {
            event(new Verified($escort));
        }

        return redirect('/login')->with('success', 'Email verified!');
    }

    public function resendEmailVerificationForm()
    {
        return view('auth.resend-email-verification');
    }

    public function resendVerificationEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $escort = Escort::where('email', $validated['email'])->first();

        if (!$escort) {
            return redirect()->route('verification.notice')->withErrors([
                'email' => 'We could not find that email address..',
            ])->withInput();
        }

        if ($escort->hasVerifiedEmail()) {
            return redirect()->route('login')->with('success', 'This email is already verified.');
        }
        // Resend the verification email
        event(new Registered($escort));

        return redirect()->route('login')->with('success', 'A new verification link has been sent to your email address.');
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('escorts')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($escort, $password) {
                $escort->password = Hash::make($password);
                $escort->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
