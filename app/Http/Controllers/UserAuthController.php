<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function user_register_form()
    {
        return view('user-registered.register');
    }

    public function user_register_form_sbmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $user = new User();
        $user->fname = $request->first_name;
        $user->lname = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        // Send verification email
        $user->sendEmailVerificationNotification();

        if ($user) {
            return redirect()->route('user.login.form')->with('success', 'Registration successful! Please check your email to verify your account.');
        }
    }

    public function user_login_form()
    {
        return view('user-registered.login');
    }

    public function user_login_submit(Request $request)
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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (is_null($user->email_verified_at)) {
                // If email is not verified, log the user out and redirect back with an error
                Auth::logout();
                return redirect()->route('user.login.form')->withErrors([
                    'email' => 'email_not_verify',
                ])->withInput();
            }

            // If email is verified, proceed with login
            if ($remember) {
                setcookie('email', $request->email, time() + 3600 * 24 * 5);
                setcookie('password', $request->password, time() + 3600 * 24 * 5);
            }

            return redirect()->route('user.profile', $user->id)->with('success', 'Login successfully!');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function user_profile($user_id)
    {
        if (Auth::guard('web')->user()->id != $user_id) {
            return redirect()->route('user.profile', Auth::guard('web')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $user = User::find(Auth::guard('web')->user()->id);
        return view('user-registered.profile', compact('user'));
    }


    public function user_profilePic_update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $validatedData = $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle Profile_pic Image file upload
        if ($request->hasFile('profile_pic')) {
            // Delete the old image if it exists
            if ($user->profile_pic) {
                $oldImagePath = public_path('images/profile_img') . '/' . $user->profile_pic;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('profile_pic');
            $originalImageName = $image->getClientOriginalName();
            $profileName = time() . '_' . $originalImageName;
            $image->move(public_path('images/profile_img'), $profileName);
        } else {
            $profileName = null;
        }

        $validatedData['profile_pic'] = $profileName;
        $user->update($validatedData);

        return redirect()->route('user.profile', $user->id)->with('success', 'Profile picture update!');
    }

    public function profileEditForm($user_id)
    {
        if (Auth::guard('web')->user()->id != $user_id) {
            return redirect()->route('user.profileEditForm', Auth::guard('web')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $user = User::find(Auth::guard('web')->user()->id);
        return view('user-registered.profile-edit', compact('user'));
    }

    public function user_update_profile(Request $request, $user_id)
    {
        if (Auth::guard('web')->user()->id != $user_id) {
            return redirect()->route('user.profileEditForm', Auth::guard('web')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $user = User::find($user_id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);


        $user->update([
            'fname' => $validatedData['first_name'],
            'lname' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('user.profile', $user->id)->with('success', 'User updated successfully!');
    }

    public function verifyUserEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        // Check if the hash matches the user's email hash
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('user.login.form')->withErrors(['error' => 'Invalid verification link.']);
        }

        // If the user has already verified their email
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.login.form')->with('status', 'Your email is already verified.');
        }

        // Mark the email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Redirect with success message
        return redirect()->route('user.login.form')->with('success', 'Your email has been verified successfully.');
    }

    public function resendEmailVerificationForm()
    {
        return view('user-registered.resend-email-verification');
    }


    public function resendVerificationEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return redirect()->route('user.verification.notice')->withErrors([
                'email' => 'We could not find that email address.',
            ])->withInput();
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.login.form')->with('success', 'This email is already verified.');
        }

        // Resend the verification email
        $user->sendEmailVerificationNotification(); // Use your custom notification if needed

        return redirect()->route('user.login.form')->with('success', 'A new verification link has been sent to your email address.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login.form');
    }
}
