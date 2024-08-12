<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeAgencyMail;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AgencyController extends Controller
{
    public function agency_regiser_from()
    {
        return view('user-agency.register');
    }

    public function agency_regiser_from_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:agencies,email',
            'phone_number' => 'required',
            'address' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $agency = new Agency();

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone_number = $request->phone_number;
        $agency->password = Hash::make($validated['password']);
        $agency->save();

        if ($agency) {
            Mail::to($agency->email)->send(new WelcomeAgencyMail($agency));
            return redirect()->route('agency.login')->with('success', 'Agency Register successfully!');
        }
    }

    public function agency_login_form()
    {
        return view('user-agency.login');
    }

    public function agency_login_form_submit(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('agency')->attempt($credential)) {
            $agency = Agency::find(Auth::guard('agency')->user()->id);
            return redirect()->route('agency.detail', $agency->id)->with('success', 'Login successfully!');;
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function agency_detail($id)
    {
        $agency = Agency::find(Auth::guard('agency')->user()->id);
        // if ($agency->id != $id) {
        //     return redirect()->route('agency.dashboard')->with('error', 'You are not authorized to access this page.');
        // }
        return view('user-agency.detail', compact('agency'));
    }

    public function showForgotPasswordForm()
    {
        return view('auth.agency-forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('agencies')->sendResetLink(
            $request->only('email')
        );
        // 
        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('agency.login')->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.agency-reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        dd($request);
        // $request->validate([
        //     'token' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed|min:8',
        // ]);

        // $status = Password::broker('escorts')->reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($escort, $password) {
        //         $escort->password = Hash::make($password);
        //         $escort->save();
        //     }
        // );

        // return $status === Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('success', __($status))
        //     : back()->withErrors(['email' => [__($status)]]);

        // $request->validate([
        //     'token' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8|confirmed',
        // ]);      

        // $status = Password::broker('agencies')->reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($agency, $password) {
        //         $agency->password = Hash::make($password);
        //         $agency->save();
        //     }
        // );

        // return $status === Password::PASSWORD_RESET
        //     ? redirect()->route('agency.login')->with('status', __($status))
        //     : back()->withErrors(['email' => [__($status)]]);
    }

    public function agency_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('agency.login')->with('success', 'Logged out successfully!');
    }
}
