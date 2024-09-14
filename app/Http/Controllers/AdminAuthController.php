<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view("admin.register");
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        
        
        $admin->save();
        
        // Auth::guard('admin')->login($admin);
        
        return redirect()->intended('/admin/login');
    }
    public function showLoginForm()
    {
        return view("admin.login");
    }
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
         ]);
   
         if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->intended('/admin/dashboard');
         }
         // Authentication failed...
         return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
         ])->withInput();
    }
    public function dashboard(){
        $totalEscorts = DB::table('escorts')->count();
        $totalAgencies = DB::table('agencies')->count();
        $totalUsers = DB::table('users')->count();
        
        return view('admin.dashboard', compact('totalEscorts','totalAgencies','totalUsers'));
    }  
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/admin/login');
    }
}
