<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EscortsAuthController extends Controller
{
    //todo: Register Escort
    public function escort_register_form(){
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

        if ($escort) {
            return redirect()->route('login');
        }
    }

    public function escort_login_form(Request $request){
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            return redirect()->route('escorts.profile');
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function profile(){
        return view('user.profile');
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
