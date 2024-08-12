<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeAgencyMail;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        if($agency){
            Mail::to($agency->email)->send(new WelcomeAgencyMail($agency));
            return redirect()->route('agency.login')->with('success', 'Agency Register successfully!');
        }
    }

    public function agency_login_form(){
        return view('user-agency.login');
    }
}
