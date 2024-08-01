<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEscortsController extends Controller
{
    public function index(){
        return view("user.landing");
    }
    //todo: Escort Profile
    public function profile()
    {
        $escort = Escort::find(Auth::guard('escort')->user()->id);
        return view('user.profile', compact('escort'));
    }
}
