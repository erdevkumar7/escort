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

    public function allescorts()
    {
        $allescorts = DB::table("escorts")->orderBy("created_at", "desc")->get();
        // dd($allescorts);
        return view("admin.all-escorts", compact('allescorts'));
    }


    public function addescorts()
    {

        return view("admin.add-escorts");
    }

    public function postescorts(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname',
            'pictures' => 'required|array|min:1',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'phone_number' => 'required',
            'age' => 'required',
            'canton' => 'required',
            'city' => 'required',
            'services' => 'required|array|min:1',
            'origin' => 'required',
            'type' => 'required',
            'text_description' => 'required|min:30',
            'video' => 'nullable|array',
            'video.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000',
            'hair_color' => 'nullable',
            'hair_length' => 'nullable',
            'breast_size' => 'nullable',
            'height' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'build' => 'nullable',
            'smoker' => 'boolean',
            'language_spoken' => 'nullable|array',
            'address' => 'nullable',
            'outcall' => 'boolean',
            'incall' => 'boolean',
            'whatsapp_number' => 'nullable',
            'availability' => 'nullable|array',
            'parking' => 'boolean',
            'disabled' => 'boolean',
            'accepts_couples' => 'boolean',
            'elderly' => 'boolean',
            'air_conditioned' => 'boolean',
            'rates_in_chf' => 'nullable|numeric',
            'currencies_accepted' => 'nullable|array',
            'payment_method' => 'nullable|array',
        ]);

        // Handle Image file upload
        $pictures = [];
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $image) {
                $originalImageName = $image->getClientOriginalName();
                $imageName = time() . '_' . $originalImageName;
                $image->move(public_path('images/escorts_img'), $imageName);
                $pictures[] = $imageName;
            }
        }


        // Handle video file upload
        $video = [];
        if ($request->hasFile('video')) {
            foreach ($request->file('video') as $vdo) {
                $originalVdoName = $vdo->getClientOriginalName();
                $vdoName = time() . '_' . $originalVdoName;
                $vdo->move(public_path('videos'), $vdoName);
                $video[] = $vdoName;
            }
        }


        $validatedData['pictures'] = json_encode($pictures);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['video'] = json_encode($video);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        Escort::create($validatedData);

        return redirect()->route('admin.escorts')->with('success', 'Escort added successfully!');
    }

    public function escorts_by_id($id)
    {
        $escorts = Escort::find($id);
        $pictures = json_decode($escorts->pictures);
        $video = json_decode($escorts->video);
        $services = json_decode($escorts->services, true);
        $language_spoken = json_decode($escorts->language_spoken, true);
        $availability = json_decode($escorts->availability, true);
        $currencies_accepted = json_decode($escorts->currencies_accepted, true);
        $payment_method = json_decode($escorts->payment_method, true);
        return view('admin.escorts-by-id', compact('escorts', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    //todo: Delete Escorts
    public function deleteEscorts($id)
    {
        $escorts = Escort::find($id);
        $pictures = json_decode($escorts->pictures);
        $video = json_decode($escorts->video);

        //delete escorts pics
        if($pictures){
            foreach($pictures as $picture){
                $imagePath = public_path('images/escorts_img') . '/' . $picture;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        //Delete Escorts videos
        if($video){
            foreach($video as $vdo){
                $vdoPath = public_path('videos') .'/'. $vdo;
                if(file_exists( $vdoPath )) {
                    unlink($vdoPath);
                }
            }
        }

        $escorts->delete();
        return redirect()->route('admin.escorts')->with('success','Escorts deleted successfully');
    }
}
