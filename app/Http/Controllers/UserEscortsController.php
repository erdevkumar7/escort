<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Badge;
use App\Models\Escort;
use App\Models\Media;
use App\Models\PaymentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEscortsController extends Controller
{
    public function index(Request $request)
    {
        // Define your base route
        $baseUrl = url('/escort-list');

        $query = DB::table("escorts")
            ->orderBy("updated_at", "desc");

        // Check if there's a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nickname', 'like', '%' . $search . '%');
        }
        // Get the selected category from the AJAX request
        if ($request->input('category')) {
            $category = $request->input('category');
            $query->where('type', $category);
        }
        // Paginate the results, appending search parameters to the pagination links
        $allescorts = $query->paginate(12)->withPath($baseUrl)->appends($request->except('page'));

        // If the request is made via AJAX, return a partial view
        if ($request->ajax()) {
            return view('user-escort.partials-escort-list', compact('allescorts'))->render();
        }

        $allPremiumEscort = DB::table('escorts')
            ->where('is_premium', true)
            ->orderBy("updated_at", "desc")
            ->get();

        $allNewEscort = DB::table('escorts')
            ->where('created_at', '>=', Carbon::now()->subDays(5)) // 5 days ago
            ->orderBy("created_at", "desc")
            ->get();

        $allNewActiveEscort = DB::table('escorts')
            ->where('status', true)
            ->orderBy('created_at', "desc")
            ->get();

        $escortWithMaxFollowers = Escort::withCount('followers')
            ->orderBy('followers_count', 'desc')  // Order by the number of followers
            ->take(10)
            ->get();

        $premimBadgeDetail = Badge::where('name', 'Premium')->first();
        $newBadgeDetail = Badge::where('name', 'New')->first();
        $certifiedBadgeDetail = Badge::where('name', 'Certified')->first();

        return view("user-escort.index", compact(
            'allescorts',
            'allNewActiveEscort',
            'escortWithMaxFollowers',
            'allNewEscort',
            'newBadgeDetail',
            'allPremiumEscort',
            'premimBadgeDetail',
            'certifiedBadgeDetail'
        ));
    }

    public function escort_list(Request $request)
    {
        $allescorts = DB::table("escorts")
            ->orderBy("updated_at", "desc")
            ->paginate(12);
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
        // Check if the authenticated escort matches the ID
        if (Auth::guard('escort')->user()->id != $id) {
            return redirect()->route('escorts.dashboard', Auth::guard('escort')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        $escort = Escort::find(Auth::guard('escort')->user()->id);

        // Fetch pictures and videos for the escort
        $pictures = Media::where('escort_id', $escort->id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $escort->id)->where('type', 'video')->get();

        // Get the latest succeeded payment for the escort
        $paymentMaxEndDate = PaymentDetail::where('escort_id', $escort->id)
            ->where('status', 'succeeded')
            ->select('*', DB::raw('DATE_ADD(created_at, INTERVAL time_duration DAY) as end_date'))
            ->orderBy('end_date', 'desc')
            ->first();

        // Check if paymentMaxEndDate is found
        $adsDetailsOfMaxEndDatePlan = null;
        if ($paymentMaxEndDate) {
            $adsDetailsOfMaxEndDatePlan = Advertise::find($paymentMaxEndDate->ads_id);
        }

        // Pass variables to the view
        return view('user-escort.dashboard', compact('escort', 'pictures', 'videos', 'paymentMaxEndDate', 'adsDetailsOfMaxEndDatePlan'));
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

        $videodBadgeDetail = Badge::where('name', 'Video')->first();

        return view('user-escort.my-videos', compact('videos', 'videodBadgeDetail'));
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

    public function getEscortByCategory(Request $request, $category)
    {
        $allescorts = DB::table('escorts')
            ->where([
                ['status', true],
                ['type', $category]
            ])
            ->orderBy("updated_at", "desc")
            ->paginate(12);
        return view('user-escort.escort-list', compact('allescorts'));
    }

    public function getAllAdvrtise()
    {
        $advertises = DB::table('advertises')
            ->orderBy('price', 'asc')
            ->get();

        return view('user-escort.all-advertise', compact('advertises'));
    }
}
