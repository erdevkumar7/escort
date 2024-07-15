<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function showRegistrationForm()
    {
        return view("admin.register");
    }



    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'password' => 'required',
        ]);
 
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin-> phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = $request->password;
       
 
        $admin->save();

        // Auth::guard('admin')->login($admin);

        return redirect()->intended('/admin/login');
    }

}
