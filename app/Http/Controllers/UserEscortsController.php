<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEscortsController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = DB::table("escorts")->orderBy("created_at", "desc");

    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->where('nickname', 'like', '%' . $search . '%');
    //     }

    //     $allescorts = $query->paginate(12);

    //     foreach ($allescorts as $escort) {
    //         // Fetch images for the current escort
    //         $escort->pictures = Media::where('escort_id', $escort->id)
    //             ->where('type', 'image')
    //             ->get();

    //         // Fetch videos for the current escort
    //         $escort->video = Media::where('escort_id', $escort->id)
    //             ->where('type', 'video')
    //             ->get();
    //     }

    //     // Two time Decode must for data endcoding
    //     foreach ($allescorts as $escort) {
    //         $escort->services = json_decode($escort->services, true);
    //         $escort->language_spoken = json_decode($escort->language_spoken, true);
    //         $escort->availability = json_decode($escort->availability, true);
    //         $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
    //         $escort->payment_method = json_decode($escort->payment_method, true);
    //     }

    //     // foreach ($allescorts as $escort) {
    //     //     $escort->services = json_decode($escort->services, true);
    //     //     $escort->language_spoken = json_decode($escort->language_spoken, true);
    //     //     $escort->availability = json_decode($escort->availability, true);
    //     //     $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
    //     //     $escort->payment_method = json_decode($escort->payment_method, true);
    //     // }

    //     if ($request->ajax()) {
    //         return view('user-escort.partials-escort-list', compact('allescorts'))->render();
    //     }

    //     return view("user-escort.index", compact('allescorts'));
    // }

    public function index(Request $request)
    {
        // Define your base route
        $baseUrl = url('/escort-list');

        // Start the query to fetch escorts
        $query = DB::table("escorts")->orderBy("created_at", "desc");

        // Check if there's a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nickname', 'like', '%' . $search . '%');
        }

        // Paginate the results, appending search parameters to the pagination links
        $allescorts = $query->paginate(12)->withPath($baseUrl)->appends($request->except('page'));

        // Fetch pictures and videos for each escort
        foreach ($allescorts as $escort) {
            $escort->pictures = Media::where('escort_id', $escort->id)
                ->where('type', 'image')
                ->get();

            $escort->video = Media::where('escort_id', $escort->id)
                ->where('type', 'video')
                ->get();
        }

        // Decode JSON-encoded fields for each escort
        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }

        // If the request is made via AJAX, return a partial view
        if ($request->ajax()) {
            return view('user-escort.partials-escort-list', compact('allescorts'))->render();
        }

        // Return the main view with the paginated escorts
        return view("user-escort.index", compact('allescorts'));
    }


    public function escort_list(Request $request)
    {
        $query = DB::table("escorts")->orderBy("created_at", "desc");

        $allescorts = $query->paginate(12);
        foreach ($allescorts as $escort) {
            // Fetch images for the current escort
            $escort->pictures = Media::where('escort_id', $escort->id)
                ->where('type', 'image')
                ->get();

            // Fetch videos for the current escort
            $escort->video = Media::where('escort_id', $escort->id)
                ->where('type', 'video')
                ->get();
        }


        // Two time Decode must for data endcoding
        foreach ($allescorts as $escort) {
            $escort->services = json_decode($escort->services, true);
            $escort->language_spoken = json_decode($escort->language_spoken, true);
            $escort->availability = json_decode($escort->availability, true);
            $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
            $escort->payment_method = json_decode($escort->payment_method, true);
        }

        // foreach ($allescorts as $escort) {
        //     $escort->services = json_decode($escort->services, true);
        //     $escort->language_spoken = json_decode($escort->language_spoken, true);
        //     $escort->availability = json_decode($escort->availability, true);
        //     $escort->currencies_accepted = json_decode($escort->currencies_accepted, true);
        //     $escort->payment_method = json_decode($escort->payment_method, true);
        // }

        return view('user-escort.escort-list', compact('allescorts'));
    }


    //todo: Escort Profile
    public function profile($id)
    {
        if (Auth::guard('escort')->user()->id != $id) {
            return redirect()->route('escorts.profile', Auth::guard('escort')->user()->id)->with('error', 'You are not authorized to access this page.');
        }
        $escort = Escort::find(Auth::guard('escort')->user()->id);
        // $escort = Escort::find(Auth::guard('escort')->user()->id);
        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $video = Media::where('escort_id', $id)->where('type', 'video')->get();
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.profile', compact('escort', 'language_spoken', 'pictures', 'video', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    public function dashboard($id)
    {
        if (Auth::guard('escort')->user()->id != $id) {
            return redirect()->route('escorts.dashboard', Auth::guard('escort')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $escort = Escort::find(Auth::guard('escort')->user()->id);

        $pictures = Media::where('escort_id', $escort->id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $escort->id)->where('type', 'video')->get();
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.dashboard', compact('escort', 'language_spoken', 'pictures', 'videos', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    public function escort_myPictures($id)
    {
        if (Auth::guard('escort')->user()->id != $id) {
            return redirect()->route('escorts.myPictures', Auth::guard('escort')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $pictures = Media::where('type', 'image')
            ->where('escort_id', Auth::guard('escort')->user()->id)
            ->get();

        return view('user-escort.my-pictures', compact('pictures'));
    }


    public function escort_myVideos($id)
    {
        if (Auth::guard('escort')->user()->id != $id) {
            return redirect()->route('escorts.myVideos', Auth::guard('escort')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $videos = Media::where('type', 'video')
            ->where('escort_id', Auth::guard('escort')->user()->id)
            ->get();

        return view('user-escort.my-videos', compact('videos'));
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
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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


        // $pictures = json_decode($escort->pictures, true) ?? [];
        // if ($request->hasFile('pictures')) {
        //     foreach ($request->file('pictures') as $image) {
        //         $originalImageName = $image->getClientOriginalName();
        //         $imageName = time() . '_' . $originalImageName;
        //         $image->move(public_path('images/escorts_img'), $imageName);
        //         $pictures[] = $imageName;
        //     }
        // }


        // if ($request->hasFile('profile_pic')) {
        //     // Delete the old image if it exists
        //     if ($escort->profile_pic) {
        //         $oldImagePath = public_path('images/profile_img') . '/' . $escort->profile_pic;
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }

        //     // Upload the new image
        //     $image = $request->file('profile_pic');
        //     $originalImageName = $image->getClientOriginalName();
        //     $profileName = time() . '_' . $originalImageName;
        //     $image->move(public_path('images/profile_img'), $profileName);
        // } else {
        //     $profileName = null;
        // }

        // $videos = json_decode($escort->video, true) ?? [];
        // if ($request->hasFile('video')) {
        //     foreach ($request->file('video') as $vdo) {
        //         $originalVdoName = $vdo->getClientOriginalName();
        //         $vdoName = time() . '_' . $originalVdoName;
        //         $vdo->move(public_path('videos'), $vdoName);
        //         $videos[] = $vdoName;
        //     }
        // }

        // $validatedData['profile_pic'] = $profileName;
        // $validatedData['pictures'] = json_encode($pictures);
        // $validatedData['video'] = json_encode($videos);
        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        $escort->update($validatedData);

        return redirect()->route('escorts.profile', $escort->id)->with('success', 'Escort updated successfully!');
    }

    public function escort_pictures_update(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);
        $validatedData = $request->validate([
            'pictures' => 'nullable|array|min:1',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
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

        $validatedData['pictures'] = json_encode($pictures);

        $escort->update($validatedData);

        return redirect()->route('escorts.myPictures', $escort->id)->with('success', 'Pictures Added successfully!');
    }


    public function escort_pictures_delete(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);

        // Validate the request to ensure the image name is provided
        $validatedData = $request->validate([
            'image_name' => 'required|string',
        ]);

        $imageToDelete = $validatedData['image_name'];

        // Decode the JSON field to get the current array of pictures
        $pictures = json_decode($escort->pictures, true) ?? [];

        // Check if the image exists in the array
        if (($key = array_search($imageToDelete, $pictures)) !== false) {
            // Remove the image from the array
            unset($pictures[$key]);

            // Re-index the array to ensure it's a valid JSON array
            $pictures = array_values($pictures);

            // Update the pictures field in the database
            $escort->pictures = json_encode($pictures);
            $escort->save();

            // Optional: Delete the image file from the server
            $imagePath = public_path('images/escorts_img') . '/' . $imageToDelete;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            return redirect()->route('escorts.myPictures', $escort->id)->with('success', 'Picture deleted successfully!');
        } else {
            return redirect()->route('escorts.myPictures', $escort->id)->with('error', 'Picture not found!');
        }
    }


    public function profile_pic_update(Request $request, $id)
    {
        $escort = Escort::findOrFail($id);
        $validatedData = $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
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
        } else {
            $profileName = null;
        }

        $validatedData['profile_pic'] = $profileName;
        $escort->update($validatedData);

        return redirect()->route('escorts.profile', $escort->id)->with('success', 'Profile picture update!');
    }

    public function escort_detail($id)
    {
        // Fetch the escort along with the count of followers
        $escort = Escort::withCount('followers')->findOrFail($id);
        // $escort = Escort::find($id);
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }
        // Store the previous URL in session for redirection
        if (url()->previous()) {
            session(['previous_url' => url()->previous()]);
        }

        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-escort.escort-detail', compact('escort', 'language_spoken', 'pictures', 'videos', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }
}
