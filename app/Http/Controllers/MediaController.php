<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function add_escorts_myPictures(Request $request, $escort_id)
    {
        // Update validation rules to handle array input for 'name'
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'file|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048', // Validate each file in the array         
        ]);

        // Check if the 'name' field is an array (multiple files uploaded)
        if (is_array($request->file('name'))) {
            // Handle multiple files
            foreach ($request->file('name') as $image) {
                $originalImageName = $image->getClientOriginalName();
                $imageName = time() . '_' . $originalImageName;
                $image->move(public_path('images/escorts_img'), $imageName);
                Media::create([
                    'name' => $imageName,
                    'type' => $request->type,
                    'escort_id' => $escort_id,
                ]);
            }
        } else {
            // Handle single file
            $image = $request->file('name');
            $originalImageName = $image->getClientOriginalName();
            $imgName = time() . '_' . $originalImageName;
            $image->move(public_path('images/escorts_img'), $imgName);

            Media::create([
                'name' => $imgName,
                'type' => $request->type,
                'escort_id' => $escort_id,
            ]);
        }

        return redirect()->route('escorts.myPictures', $escort_id)->with('success', 'Media uploaded successfully.');
    }


    public function add_escorts_myVideos(Request $request, $escort_id)
    {
        // Update validation rules to handle array input for 'name'
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000', // Validate each file in the array         
        ]);

        // Check if the 'name' field is an array (multiple files uploaded)
        if (is_array($request->file('name'))) {
            // Handle multiple files
            foreach ($request->file('name') as $vdo) {
                $originalVdoName = $vdo->getClientOriginalName();
                $vdoName = time() . '_' . $originalVdoName;
                $vdo->move(public_path('videos'), $vdoName);
                Media::create([
                    'name' => $vdoName,
                    'type' => $request->type,
                    'escort_id' => $escort_id,
                ]);
            }
        } else {
            // Handle single file
            $vdo = $request->file('name');
            $originalVdoName = $vdo->getClientOriginalName();
            $vdoName = time() . '_' . $originalVdoName;
            $vdo->move(public_path('videos'), $vdoName);
            Media::create([
                'name' => $vdoName,
                'type' => $request->type,
                'escort_id' => $escort_id,
            ]);
        }

        return redirect()->route('escorts.myVideos', $escort_id)->with('success', 'Media uploaded successfully.');
    }


    public function delete_media(Request $request, $escort_id, $media_id)
    {
        $media = Media::where('id', $media_id)->where('escort_id', $escort_id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
        ]);

        $mediaToDelete = $validatedData['name'];
        $mediaType = $validatedData['type'];

        if ($media && $mediaType === 'image') {
            // Optional: Delete the image file from the server
            $imagePath = public_path('images/escorts_img') . '/' . $mediaToDelete;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $media->delete();
            return redirect()->back()->with('success', 'Picture deleted successfully.');
        } elseif ($media && $mediaType === 'video') {
            $videoPath = public_path('videos') . '/' . $mediaToDelete;
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
            $media->delete();
            return redirect()->back()->with('success', 'video deleted successfully.');
        } else {
            // If the media record is not found, return with an error message
            return redirect()->back()->with('error', 'Media record not found or you do not have permission to delete this record.');
        }
    }
}
