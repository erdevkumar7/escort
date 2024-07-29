<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserEscortsController extends Controller
{
    public function index(){
        return view("user.landing");
    }
}
