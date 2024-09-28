<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Escort;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminAgencyController extends Controller
{
    //todo: Get All agency
    public function allagencies()
    {
        $allagencies = DB::table("agencies")->orderBy('created_at', 'desc')->get();
        return view("agency.all-agency", compact("allagencies"));
    }
    // addagency_form
    public function addagency_form()
    {
        return view("agency.add-agency");
    }
    // addagency_form_submit
    public function addagency_form_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:agencies,email',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|numeric',
            'address' => 'nullable|string',
        ]);

        $agency = new Agency();

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->original_password = $request->password;
        $agency->password = Hash::make($request->password);
        $agency->address = $request->address;
        $agency->phone_number = $request->phone_number;
        $agency->save();

        return redirect()->route('admin.allagencies')->with('success', 'Agency added successfully');
    }
    // agency-by-id
    public function agency($id)
    {
        $agency = Agency::find($id);
        return view('agency.show', compact('agency'));
    }
    // edit_agency_form
    public function edit_agency_form($id)
    {
        $agency = Agency::find($id);
        return view('agency.edit', compact('agency'));
    }
    // edit_agency
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
            'password' => 'nullable|min:8|confirmed', // Password is optional during updates
        ]);

        // Check if password field is filled, if yes, hash it
        if ($request->filled('password')) {
            //original_password
            $valideData['original_password'] = $valideData['password'];
            $valideData['password'] = Hash::make($request->password);
        } else {
            // If password is not filled, remove it from the validated data so it won't be updated
            unset($valideData['password']);
        }

        $agency->update($valideData);

        return redirect()->route('admin.allagencies')->with('success', 'Agancy Updated');
    }
    //todo: All escorts of agency
    public function agency_escorts($id)
    {
        $allescorts = DB::table("escorts")->where('agency_id', $id)->orderBy("created_at", "desc")->get();
        $agency = Agency::find($id);
        if (!$agency) {
            return redirect()->back()->with('error', 'Agency not found.');
        }
        return view("agency.all-escorts", compact('allescorts', 'agency'));
    }
    // agency_add_escorts_form
    public function agency_add_escorts_form($id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return redirect()->back()->with('error', 'Agency not found.');
        }
        return view('agency.add-escorts', compact('agency'));
    }
    // agency_add_escorts
    public function agency_add_escorts(Request $request, $agency_id)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname',
            'email' => 'required|email|unique:escorts',
            'password' => 'required|string|min:8|confirmed',
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
            'videos' => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000',
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
            'media_type_image' => 'required|string',
            'media_type_video' => 'required|string',
        ]);

        // Create a new Escort instance
        $escort = new Escort();
        $escort->nickname = $validatedData['nickname'];
        $escort->email = $escort['email'];
        $escort->original_password = $validatedData['password'];
        $escort->password = Hash::make($validatedData['password']); // Hash the password
        $escort->phone_number = $validatedData['phone_number'];
        $escort->age = $validatedData['age'];
        $escort->canton = $validatedData['canton'];
        $escort->city = $validatedData['city'];
        $escort->services = json_encode($validatedData['services']);
        $escort->origin = $validatedData['origin'];
        $escort->type = $validatedData['type'];
        $escort->text_description = $validatedData['text_description'];
        $escort->hair_color = $validatedData['hair_color'] ?? null;
        $escort->hair_length = $validatedData['hair_length'] ?? null;
        $escort->breast_size = $validatedData['breast_size'] ?? null;
        $escort->height = $validatedData['height'] ?? null;
        $escort->weight = $validatedData['weight'] ?? null;
        $escort->build = $validatedData['build'] ?? null;
        $escort->smoker = $validatedData['smoker'] ?? false;
        $escort->language_spoken = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $escort->address = $validatedData['address'] ?? null;
        $escort->outcall = $validatedData['outcall'] ?? false;
        $escort->incall = $validatedData['incall'] ?? false;
        $escort->whatsapp_number = $validatedData['whatsapp_number'] ?? null;
        $escort->availability = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $escort->parking = $validatedData['parking'] ?? false;
        $escort->disabled = $validatedData['disabled'] ?? false;
        $escort->accepts_couples = $validatedData['accepts_couples'] ?? false;
        $escort->elderly = $validatedData['elderly'] ?? false;
        $escort->air_conditioned = $validatedData['air_conditioned'] ?? false;
        $escort->rates_in_chf = $validatedData['rates_in_chf'] ?? null;
        $escort->currencies_accepted = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $escort->payment_method = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;
        $escort->agency_id = $agency_id;

        $escort->save();

        $escort_id = $escort->id;

        if ($escort_id) {
            // Pictures upload in media table
            if (is_array($request->file('pictures'))) {
                // Handle multiple files          
                foreach ($request->file('pictures') as $image) {
                    $originalImageName = $image->getClientOriginalName();
                    $imageName = time() . '_' . $originalImageName;
                    $image->move(public_path('images/escorts_img'), $imageName);
                    Media::create([
                        'name' => $imageName,
                        'type' => $request->media_type_image,
                        'escort_id' => $escort_id,
                        'agency_id' => $agency_id,
                    ]);
                }
            }


            // Videos upload in media table
            if (is_array($request->file('videos'))) {
                // Handle multiple files
                foreach ($request->file('videos') as $vdo) {
                    $originalVdoName = $vdo->getClientOriginalName();
                    $vdoName = time() . '_' . $originalVdoName;
                    $vdo->move(public_path('videos'), $vdoName);
                    Media::create([
                        'name' => $vdoName,
                        'type' => $request->media_type_video,
                        'escort_id' => $escort_id,
                        'agency_id' => $agency_id,
                    ]);
                }
            }
        }

        return redirect()->route('admin.agency.escorts', $agency_id)->with('success', 'Escort added successfully!');
    }
    // delete_agency
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
