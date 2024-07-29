<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminFuncController extends Controller
{
    //todo: get all users
    public function allusers()
    {
        $allusers = DB::table("users")->get();
        // return response()->json($allusers);
        return view("admin.allusers", compact('allusers'));
    }

    //todo: admin edit_user_form
    public function edit_user_form($id)
    {
        $user = User::find($id);
        return view('admin.edituser', compact('user'));
    }

    //todo: update the user
    public function update_user(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->address = $request->input('address');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('admin_allusers')->with('success', 'User Updated');
    }

    //todo:: delete user
    public function delete_user($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            return redirect()->route('admin_allusers')->with('success', 'User deleted successfully');
        };
        return redirect()->back()->with('error', 'user not Deleted');
    }

}
