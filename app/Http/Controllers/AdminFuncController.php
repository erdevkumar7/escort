<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminFuncController extends Controller
{
    //todo: get all users
    public function allusers()
    {
        $allusers = DB::table("users")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view("admin.allusers", compact('allusers'));
    }

    public function viewUser($user_id){
        $user = User::find($user_id);
        if(!$user){
            return redirect()->back()->with('error', 'No User Found!');
        }

        return view('admin.view-user', compact('user'));
    }

    public function addUserForm()
    {
        return view('admin.add-user');
    }

    public function addUserFormSubmit(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['fname'] = $validateData['first_name'];
        $validateData['lname'] = $validateData['last_name'];

        $user = User::create($validateData);

        if ($user) {
            return redirect()->route('admin_allusers')->with('success', 'User Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add User. Please try again.');
        }
    }

    //todo: admin edit_user_form
    public function edit_user_form($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'No User Found!');
        }
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
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('admin_allusers')->with('success', 'User Update Successfully!');
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
