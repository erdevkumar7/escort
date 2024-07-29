<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEscortsController extends Controller
{
    public function allescorts()
    {
        $allescorts = DB::table("escorts")->orderBy("created_at", "desc")->get();
        // $services = json_decode($allescorts->services, true);
        return view("escorts.all-escorts", compact('allescorts',));
    }


    public function addescorts()
    {

        return view("escorts.add-escorts");
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
    //todo: Escorts form
    public function edit_escorts_form($id)
    {
        $escort = Escort::find($id);

        $pictures = json_decode($escort->pictures);
        $video = json_decode($escort->video);
        $language_spoken = json_decode($escort->language_spoken, true);
        $services = json_decode($escort->services, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('escorts.escorts-edit', compact('escort', 'pictures', 'video', 'services', 'language_spoken', 'availability', 'currencies_accepted', 'payment_method'));
    }
    //todo: update Escorts
    public function edit_escorts(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);
    
        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname,' . $escort->id,
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
    
        $validatedData['pictures'] = json_encode($pictures);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['video'] = json_encode($videos);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;
    
        $escort->update($validatedData);
    
        return redirect()->route('admin.escorts')->with('success', 'Escort updated successfully!');
    }
    

    //todo: get escorts to show by it's ID
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
        return view('escorts.escorts-by-id', compact('escorts', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    //todo: Delete Escorts
    public function deleteEscorts($id)
    {
        $escorts = Escort::find($id);
        $pictures = json_decode($escorts->pictures);
        $video = json_decode($escorts->video);

        //delete escorts pics
        if ($pictures) {
            foreach ($pictures as $picture) {
                $imagePath = public_path('images/escorts_img') . '/' . $picture;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        //Delete Escorts videos
        if ($video) {
            foreach ($video as $vdo) {
                $vdoPath = public_path('videos') . '/' . $vdo;
                if (file_exists($vdoPath)) {
                    unlink($vdoPath);
                }
            }
        }

        $escorts->delete();
        return redirect()->route('admin.escorts')->with('success', 'Escorts deleted successfully');
    }
}
