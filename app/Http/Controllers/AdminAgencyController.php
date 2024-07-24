<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Escort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminAgencyController extends Controller
{
    //todo: Get All agency
    public function allagencies()
    {
        $allagencies = DB::table("agencies")->orderBy('created_at', 'desc')->get();
        return view("agency.all-agency", compact("allagencies"));
    }
    public function addagency_form()
    {
        return view("agency.add-agency");
    }

    public function addagency_form_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:agencies,email',
            'phone_number' => 'required|numeric',
            'address' => 'nullable|string',
            'counter' => 'nullable|string'
        ]);

        $agency = new Agency();

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone_number = $request->phone_number;
        $agency->counter = $request->counter;
        $agency->save();

        return redirect()->route('admin.allagencies')->with('success', 'Agency added successfully');
    }

    public function agency($id)
    {
        $agency = Agency::find($id);
        return view('agency.show', compact('agency'));
    }
    public function edit_agency_form($id)
    {
        $agency = Agency::find($id);
        return view('agency.edit', compact('agency'));
    }

    public function edit_agency(Request $request, $id)
    {
        $agency = Agency::find($id);

        $valideData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('agencies')->ignore($agency->id),
            ],
            'phone_number' => 'required|numeric',
            'address' => 'nullable|string',
            'counter' => 'nullable|string'
        ]);

        $agency->update($valideData);

        return redirect()->route('admin.allagencies')->with('success', 'Agancy Updated');
    }
    //todo: All escorts of agency
    public function agency_escorts($id){
        $allescorts = DB::table("escorts")->where('agency_id',$id)->orderBy("created_at", "desc")->get();
        $agency = Agency::find($id);
        return view("agency.show-escorts", compact('allescorts','agency'));
    }

    public function agency_add_escorts_form($id){
        $agency = Agency::find($id);
        return view('agency.add-escorts', compact('agency'));
    }

    public function agency_add_escorts(Request $request, $id)
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

        $validatedData['agency_id'] = $id;
        $validatedData['pictures'] = json_encode($pictures);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['video'] = json_encode($video);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        Escort::create($validatedData);

        return redirect()->route('admin.agency.escorts', $id)->with('success', 'Escort added successfully!');
    }

    public function delete_agency($id)
    {
        $agency = Agency::find($id);
        if ($agency) {
            $agency->delete();
            return redirect()->route('admin.allagencies')->with('success', 'Agency Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Agency Not Deleted');
        }
    }
}
