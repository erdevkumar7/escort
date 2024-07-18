<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\b;

class AdminFuncController extends Controller
{
    //todo: get all users
    public function allusers(){
        $allusers = DB::table("users")->get();
        // return response()->json($allusers);
        return view("admin.allusers", compact('allusers'));
    }

    //todo: admin edit_user_form
    public function edit_user_form($id){
        $user = User::find($id);
        return view('admin.edituser', compact('user'));
    }

    //todo: update the user
    public function update_user(Request $request, $id){
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
    
        return redirect()->route('admin_allusers')->with('success','User Updated');

    }

    //todo:: delete user
    public function delete_user($id){
        $user = DB::table('users')->where('id',$id)->delete();
        if($user){
            return redirect()->route('admin_allusers')->with('success','User deleted successfully');
        };

        return redirect()->back()->with('error','user not Deleted');
    }

    public function allescorts(){
        $allusers = DB::table("users")->get();
        // return response()->json($allusers);
        return view("admin.all-escorts", compact('allusers'));
    }

    
    public function addescorts(){
        
        return view("admin.add-escorts");
    }

    public function postescorts(Request $request){

        $request->validate([
            'nickname' => 'required',
            'description' => 'required|min:30',
            'pictures' => 'required',
            'phone_number' => 'required',
            'age' => 'required',
            'canton' => 'required',
            'city' => 'required',
            'services' => 'required',
            'origin' => 'required',
            'type' => 'required',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'rates_in_chf' => 'nullable|numeric'
        ]);

        // Handling file uploads
        $pictures = [];
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $picture) {
                $pictures[] = $picture->store('pictures', 'public');
            }
        }

        $videos = [];
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videos[] = $video->store('videos', 'public');
            }
        }

        // Store user data
        $user = new Escort([
            'nickname' => $request->nickname,
            'description' => $request->description,
            'pictures' => json_encode($pictures),
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'canton' => $request->canton,
            'city' => $request->city,
            'services' => json_encode($request->services),
            'origin' => $request->origin,
            'type' => $request->type,
            'videos' => json_encode($videos),
            'hair_color' => $request->hair_color,
            'hair_length' => $request->hair_length,
            'breast_size' => $request->breast_size,
            'height' => $request->height,
            'weight' => $request->weight,
            'build' => $request->build,
            'smoker' => $request->smoker ? 1 : 0,
            'languages_spoken' => json_encode($request->languages_spoken),
            'address' => $request->address,
            'outcall' => $request->outcall ? 1 : 0,
            'incall' => $request->incall ? 1 : 0,
            'whatsapp_number' => $request->whatsapp_number,
            'availability' => $request->availability,
            'parking' => $request->parking ? 1 : 0,
            'disabled' => $request->disabled ? 1 : 0,
            'accepts_couples' => $request->accepts_couples ? 1 : 0,
            'elderly' => $request->elderly ? 1 : 0,
            'air_conditioned' => $request->air_conditioned ? 1 : 0,
            'rates_in_chf' => $request->rates_in_chf,
            'currencies_accepted' => json_encode($request->currencies_accepted),
            'payment_methods' => json_encode($request->payment_methods),
        ]);

        $user->save();

        return redirect()->route('admin.escorts')->with('success', 'User profile created successfully!');
    } 
    

}
