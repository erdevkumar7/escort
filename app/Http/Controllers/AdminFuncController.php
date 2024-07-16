<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFuncController extends Controller
{
    //todo: get all users
    public function allusers(){
        $allusers = DB::table("users")->get();
        // return response()->json($allusers);
        return view("admin.allusers", compact('allusers'));
    }
}
