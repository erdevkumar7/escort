<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class AdminFuncController extends Controller
{
    //todo: get all users
    public function allusers(){
        $allusers = DB::table("users")->get();
        // return response()->json($allusers);
        return view("admin.allusers", compact('allusers'));
    }

    //todo: update the user
    public function update_user(Request $request, $id){
        $user = User::find($id);
    }

    //todo:: delete user
    public function delete_user($id){
        $user = DB::table('users')->where('id',$id)->delete();
        if($user){
            return redirect()->route('admin_allusers')->with('success','User deleted successfully');
        };

        return redirect()->back()->with('error','user not Deleted');
    }
}
