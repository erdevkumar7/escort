<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLoginForm(){
        return view("admin.login");
    }

    public function showRegistrationForm(){
        return view("admin.register");
    }
}
