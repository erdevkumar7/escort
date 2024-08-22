<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeAgencyMail;
use App\Models\Agency;
use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Notifications\AgencyResetPasswordNotification;
use Illuminate\Support\Facades\DB;

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
            'g-recaptcha-response' => 'required|captcha',
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credential = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('agency')->attempt($credential)) {
            if ($remember) {
                setcookie('email', $request->email, time() + 3600);
                setcookie('password', $request->password, time() + 3600);
            }
            $agency = Agency::find(Auth::guard('agency')->user()->id);
            return redirect()->route('agency.dashboard', $agency->id)->with('success', 'Login successfully!');;
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function dashboard($agency_id)
    {

        $agency = Agency::find(Auth::guard('agency')->user()->id);
        $allescorts = DB::table("escorts")->where('agency_id', Auth::guard('agency')->user()->id)->orderBy("created_at", "desc")->get();

        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.dashboard', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.dashboard', compact('agency', 'allescorts'));
    }

    public function agency_escort_detail($agency_id, $escort_id)
    {
        $escort = Escort::find($escort_id);
        $pictures = json_decode($escort->pictures);
        $video = json_decode($escort->video);
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-agency.agency-escort-detail', compact('escort', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    public function agency_add_escort_form($agency_id)
    {
        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.add.escortform', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.agency-add-escort');
    }

    //Agency Auth Functionality start ***********************************************************
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

        // $request->validate(['email' => 'required|email']);

        // $response = Password::broker('agencies')->sendResetLink(
        //     $request->only('email')
        // );

        // // Check if the password reset link was sent successfully
        // if ($response === Password::RESET_LINK_SENT) {
        //     // Fetch the agency by email
        //     $agency = \App\Models\Agency::where('email', $request->email)->first();

        //     if ($agency) {
        //         // Send custom reset password notification
        //         $agency->notify(new AgencyResetPasswordNotification($response));
        //     }

        //     return redirect()->route('agency.login')->with('success', __('passwords.sent'));
        // }

        // // If there's an error, return back with errors
        // return back()->withErrors(['email' => __($response)]);
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
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('agencies')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($agency, $password) {
                $agency->password = Hash::make($password);
                $agency->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('agency.login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function agency_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('agency.login')->with('success', 'Logged out successfully!');
    }

    //Agency Auth Functionality End **********************************************************
}
