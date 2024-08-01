<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEscortMail;
use App\Models\Escort;
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
        return view("user.register");
    }
    public function escort_register_form_submit(Request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|unique:escorts',
            'email' => 'required|email|unique:escorts',
            'phone_number' => 'required',
            'age' => 'required',
            'address' => 'required',
            'city' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $escort = new Escort();
        $escort->nickname = $validated['nickname'];
        $escort->email = $validated['email'];
        $escort->password = Hash::make($validated['password']);
        $escort->phone_number = $validated['phone_number'];
        $escort->age = $validated['age'];
        $escort->address = $validated['address'];
        $escort->city = $validated['city'];
        $escort->save();

        // Send welcome email
        Mail::to($escort->email)->send(new WelcomeEscortMail($escort));
        if ($escort) {
            return redirect()->route('login');
        }
    }

    public function escort_login_form(Request $request)
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('escort')->attempt($credential)) {
            $escort = Escort::find(Auth::guard('escort')->user()->id);
            return redirect()->route('escorts.profile', $escort->id);
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
            ?  redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
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
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
