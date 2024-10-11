<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeAgencyMail;
use App\Models\Agency;
use App\Models\Escort;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Notifications\AgencyResetPasswordNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AgencyController extends Controller
{
    public function agency_regiser_from()
    {
        if (Auth::guard('web')->check() || Auth::guard('escort')->check() || Auth::guard('agency')->check()) {
            return redirect()->route('index')->with('error', 'Already logged-in with another User!');
        }
        return view('user-agency.register');
    }

    public function agency_regiser_from_submit(Request $request)
    {
        if (Auth::guard('web')->check() || Auth::guard('escort')->check() || Auth::guard('agency')->check()) {
            return redirect()->route('index')->with('error', 'Already logged-in with another User!');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:agencies,email',
            'phone_number' => 'required',
            'address' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $agency = new Agency();

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone_number = $request->phone_number;
        $agency->original_password = $validated['password'];
        $agency->password = Hash::make($validated['password']);
        $agency->save();

        if ($agency) {
            Mail::to($agency->email)->send(new WelcomeAgencyMail($agency));
            return redirect()->route('agency.login')->with('success', 'Agency Register successfully!');
        }
    }

    public function agency_login_form()
    {
        if (Auth::guard('web')->check() || Auth::guard('escort')->check() || Auth::guard('agency')->check()) {
            return redirect()->route('index')->with('error', 'Already logged-in with another User!');
        }
        return view('user-agency.login');
    }

    public function agency_login_form_submit(Request $request)
    {
        if (Auth::guard('web')->check() || Auth::guard('escort')->check() || Auth::guard('agency')->check()) {
            return redirect()->route('index')->with('error', 'Already logged-in with another User!');
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credential = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('agency')->attempt($credential)) {
            if ($remember) {
                setcookie('email', $request->email, time() + 3600 * 24 * 3);
                setcookie('password', $request->password, time() + 3600 * 24 * 3);
            }
            $agency = Agency::find(Auth::guard('agency')->user()->id);
            return redirect()->route('agency.dashboard', $agency->id)->with('success', 'Login successfully!');;
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }


    public function profile($agency_id)
    {

        $agency = Agency::find(Auth::guard('agency')->user()->id);

        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.profile', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.profile', compact('agency'));
    }

    public function profileEditForm($agency_id)
    {
        $agency = Agency::find(Auth::guard('agency')->user()->id);

        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.profileEditForm', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.profile-edit', compact('agency'));
    }

    public function edit_agency(Request $request, $agency_id)
    {
        $agency = Agency::find($agency_id);

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
        ]);

        $agency->update($valideData);

        return redirect()->route('agency.profile', $agency->id)->with('success', 'Agancy Updated');
    }

    public function profile_pic_update(Request $request, $agency_id)
    {
        $agency = Agency::findOrFail($agency_id);
        $validatedData = $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle Profile_pic Image file upload
        if ($request->hasFile('profile_pic')) {
            // Delete the old image if it exists
            if ($agency->profile_pic) {
                $oldImagePath = public_path('images/profile_img') . '/' . $agency->profile_pic;
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
        $agency->update($validatedData);

        return redirect()->route('agency.profile', $agency->id)->with('success', 'Profile picture update!');
    }

    public function escort_listing($agency_id)
    {

        $agency = Agency::find(Auth::guard('agency')->user()->id);
        $allescorts = DB::table("escorts")->where('agency_id', Auth::guard('agency')->user()->id)->orderBy("created_at", "desc")->get();

        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.escort_listing', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.escort-listing', compact('agency', 'allescorts'));
    }
    public function dashboard($agency_id)
    {

        $agency = Agency::find(Auth::guard('agency')->user()->id);
        $allescorts = DB::table("escorts")->where('agency_id', Auth::guard('agency')->user()->id)->orderBy("created_at", "desc")->get();

        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.dashboard', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.dashboard', compact('agency', 'allescorts'));
    }

    public function agency_escort_detail($agency_id, $escort_id)
    {
        $agency = Agency::find(Auth::guard('agency')->user()->id);
        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.escort.detail', ['agency_id' => Auth::guard('agency')->user()->id, 'escort_id' => $escort_id])->with('error', 'You are not authorized to access this page.');
        }

        $escort = Escort::where('id', $escort_id)->where('agency_id', $agency->id)->first();
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        $pictures = Media::where('escort_id', $escort_id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $escort_id)->where('type', 'video')->get();
        $services = json_decode($escort->services, true);
        $language_spoken = json_decode($escort->language_spoken, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-agency.agency-escort-detail', compact('escort', 'language_spoken', 'pictures', 'videos', 'availability', 'currencies_accepted', 'payment_method', 'services'));
    }

    public function agency_add_escort_form($agency_id)
    {
        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.add.escortform', Auth::guard('agency')->user()->id)->with('error', 'You are not authorized to access this page.');
        }

        return view('user-agency.agency-add-escort');
    }


    public function agency_add_escort_form_submit(Request $request, $agency_id)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname',
            'email' => 'required|email|unique:escorts',
            'password' => 'required|string|min:8|confirmed',
            'pictures' => 'required|array|min:1|max:30',
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
        $escort->email = $validatedData['email'];
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
        return redirect()->route('agency.escort_listing', $agency_id)->with('success', 'Escort added successfully!');
    }

    public function edit_escorts_form($agency_id, $id)
    {
        $agency = Agency::find(Auth::guard('agency')->user()->id);
        if (Auth::guard('agency')->user()->id != $agency_id) {
            return redirect()->route('agency.edit_escorts_form', ['agency_id' => Auth::guard('agency')->user()->id, 'id' => $id])->with('error', 'You are not authorized to access this page.');
        }
        // $escort = Escort::find($id);
        $escort = Escort::where('id', $id)->where('agency_id', $agency->id)->first();
        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();
        $language_spoken = json_decode($escort->language_spoken, true);
        $services = json_decode($escort->services, true);
        $availability = json_decode($escort->availability, true);
        $currencies_accepted = json_decode($escort->currencies_accepted, true);
        $payment_method = json_decode($escort->payment_method, true);

        return view('user-agency.agency-edit-escort', compact('escort', 'pictures', 'videos', 'services', 'language_spoken', 'availability', 'currencies_accepted', 'payment_method'));
    }

    public function edit_escorts_form_submit(Request $request, $escort_id)
    {
        $escort = Escort::findOrFail($escort_id);

        if ($request->file('pictures')) {
            $currentPicturesCount = Media::where('escort_id', $escort_id)
                ->where('type', 'image') // Assuming you store image type in 'type'
                ->count();

            // Check if adding the new pictures exceeds the limit of 30
            $newPicturesCount = count($request->file('pictures'));
            if (($currentPicturesCount + $newPicturesCount) > 30) {
                return redirect()->back()->withInput()->withErrors(['pictures' => 'You can upload maximum 30 pictures.']);
            }
        }

        if ($request->file('videos')) {
            $currentVideosCount = Media::where('escort_id', $escort_id)
                ->where('type', 'video')
                ->count();

            $newVideosCount = count($request->file('videos'));
            if (($currentVideosCount + $newVideosCount) > 30) {
                return redirect()->back()->withInput()->withErrors(['videos' => 'You can upload maximum 30 videos.']);
            }
        }

        $validatedData = $request->validate([
            'nickname' => 'required|unique:escorts,nickname,' . $escort->id,
            'pictures' => 'nullable|array|min:1|max:30',
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
            'videos.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:25600',
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


        $validatedData['services'] = json_encode($validatedData['services']);
        $validatedData['language_spoken'] = isset($validatedData['language_spoken']) ? json_encode($validatedData['language_spoken']) : null;
        $validatedData['availability'] = isset($validatedData['availability']) ? json_encode($validatedData['availability']) : null;
        $validatedData['currencies_accepted'] = isset($validatedData['currencies_accepted']) ? json_encode($validatedData['currencies_accepted']) : null;
        $validatedData['payment_method'] = isset($validatedData['payment_method']) ? json_encode($validatedData['payment_method']) : null;

        $escort->update($validatedData);

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
                        'agency_id' => Auth::guard('agency')->user()->id,
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
                        'agency_id' => Auth::guard('agency')->user()->id,
                    ]);
                }
            }
        }

        return redirect()->route('agency.escort_listing', Auth::guard('agency')->user()->id)->with('success', 'Escort updated successfully!');
    }

    public function deleteEscorts($id)
    {
        $escort = Escort::find($id);

        if (!$escort) {
            return redirect()->back()->with('error', 'Escort not found.');
        }

        // Find and delete all media records related to the escort        
        $pictures = Media::where('escort_id', $id)->where('type', 'image')->get();
        $videos = Media::where('escort_id', $id)->where('type', 'video')->get();
        //delete escorts pics
        if ($pictures) {
            foreach ($pictures as $picture) {
                $imagePath = public_path('images/escorts_img') . '/' . $picture->name;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $picture->delete();
            }
        }

        //Delete Escorts videos
        if ($videos) {
            foreach ($videos as $video) {
                $vdoPath = public_path('videos') . '/' . $video->name;
                if (file_exists($vdoPath)) {
                    unlink($vdoPath);
                }

                $video->delete();
            }
        }

        $escort->delete();
        return redirect()->route('agency.escort_listing', Auth::guard('agency')->user()->id)->with('success', 'Escorts deleted successfully');
    }

    //Agency Auth Functionality start ***********************************************************
    public function showForgotPasswordForm()
    {
        return view('auth.agency-forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('agencies')->sendResetLink(
            $request->only('email')
        );
        // 
        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('agency.login')->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);

        // $request->validate(['email' => 'required|email']);

        // $response = Password::broker('agencies')->sendResetLink(
        //     $request->only('email')
        // );

        // // Check if the password reset link was sent successfully
        // if ($response === Password::RESET_LINK_SENT) {
        //     // Fetch the agency by email
        //     $agency = \App\Models\Agency::where('email', $request->email)->first();

        //     if ($agency) {
        //         // Send custom reset password notification
        //         $agency->notify(new AgencyResetPasswordNotification($response));
        //     }

        //     return redirect()->route('agency.login')->with('success', __('passwords.sent'));
        // }

        // // If there's an error, return back with errors
        // return back()->withErrors(['email' => __($response)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.agency-reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('agencies')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($agency, $password) {
                $agency->password = Hash::make($password);
                $agency->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('agency.login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function agency_logout(Request $request)
    {
        Auth::guard('agency')->logout();
        return redirect()->route('agency.login');
    }

    //Agency Auth Functionality End **********************************************************
}
