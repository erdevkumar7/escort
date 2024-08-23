<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEscortsController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table("escorts")->orderBy("created_at", "desc");

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        $allescorts = $query->get();
        // Two time Decode must for data endcoding
        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->pictures = json_decode($escort->pictures, true);
            $escort->video = json_decode($escort->video, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }

        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->pictures = json_decode($escort->pictures, true);
            $escort->video = json_decode($escort->video, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }

        if ($request->ajax()) {
            return view('user-escort.partials-escort-list', compact('allescorts'))->render();
        }

        return view("user-escort.index", compact('allescorts'));
    }

    public function escort_list(Request $request)
    {
        $query = DB::table("escorts")->orderBy("created_at", "desc");

        $allescorts = $query->get();
        // Two time Decode must for data endcoding
        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->pictures = json_decode($escort->pictures, true);
            $escort->video = json_decode($escort->video, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }

        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->pictures = json_decode($escort->pictures, true);
            $escort->video = json_decode($escort->video, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }
        // dd( $allescorts[1]->services);
        return view('user-escort.escort-list', compact('allescorts'));
    }


    //todo: Escort Profile
    public function profile()
    {
        $escort = Escort::find(Auth::guard('escort')->user()->id);
        // $escort = Escort::find(Auth::guard('escort')->user()->id);
        $pictures = json_decode($escort->pictures, true);
        $video = json_decode($escort->video, true);
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.profile', compact('escort', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    // profileEditForm
    public function profileEditForm($id)
    {
        $escort = Escort::find($id);
        $pictures = json_decode($escort->pictures);
        $video = json_decode($escort->video);
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.profile-edit', compact('escort', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }
    // update_profile
    public function update_profile(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);

        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname,' . $escort->id,
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pictures' => 'nullable|array|min:1',
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
        $pictures = json_decode($escort->pictures, true) ?? [];
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $image) {
                $originalImageName = $image->getClientOriginalName();
                $imageName = time() . '_' . $originalImageName;
                $image->move(public_path('images/escorts_img'), $imageName);
                $pictures[] = $imageName;
            }
        }

        // Handle Profile_pic Image file upload
        if ($request->hasFile('profile_pic')) {
            // Delete the old image if it exists
            if ($escort->profile_pic) {
                $oldImagePath = public_path('images/profile_img') . '/' . $escort->profile_pic;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('profile_pic');
            $originalImageName = $image->getClientOriginalName();
            $profileName = time() . '_' . $originalImageName;
            $image->move(public_path('images/profile_img'), $profileName);
        }

        // Handle video file upload
        $videos = json_decode($escort->video, true) ?? [];
        if ($request->hasFile('video')) {
            foreach ($request->file('video') as $vdo) {
                $originalVdoName = $vdo->getClientOriginalName();
                $vdoName = time() . '_' . $originalVdoName;
                $vdo->move(public_path('videos'), $vdoName);
                $videos[] = $vdoName;
            }
        }

        $validatedData['profile_pic'] = $profileName;
        $validatedData['pictures'] = json_encode($pictures);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['video'] = json_encode($videos);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        $escort->update($validatedData);

        return redirect()->route('escorts.profile', $escort->id)->with('success', 'Escort updated successfully!');
    }

    public function escort_detail($id)
    {
        $escort = Escort::find($id);
        $pictures = json_decode($escort->pictures);
        $video = json_decode($escort->video);
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.escort-detail', compact('escort', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }
}
