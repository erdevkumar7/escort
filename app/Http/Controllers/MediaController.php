<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function add_escorts_myPictures(Request $request, $escort_id)
    {
        // Get the current number of pictures the escort has
        $currentPicturesCount = Media::where('escort_id', $escort_id)
            ->where('type', $request->media_type_image) // Assuming you store image type in 'type'
            ->count();

        // Check if adding the new pictures exceeds the limit of 30
        $newPicturesCount = count($request->file('pictures'));
        if (($currentPicturesCount + $newPicturesCount) > 30) {
            return redirect()->back()->with('error', 'You can only upload a maximum of 30 pictures.');
        }
        // Update validation rules to handle array input for 'pictures'
        $request->validate([
            'pictures' => 'required|array',
            'pictures.*' => 'file|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048', // Validate each file in the array         
        ]);

        try {
            // Check if the 'pictures' field is an array (multiple files uploaded)
            if (is_array($request->file('pictures'))) {
                // Handle multiple files          
                foreach ($request->file('pictures') as $image) {
                    $originalImageName = $image->getClientOriginalName();
                    $imageName = time() . '_' . $originalImageName;

                    // Try moving the image to the public path
                    $uploadSuccess = $image->move(public_path('images/escorts_img'), $imageName);

                    // Check if the upload succeeded
                    if ($uploadSuccess) {
                        // Save the media record if upload is successful
                        Media::create([
                            'name' => $imageName,
                            'type' => $request->media_type_image,
                            'escort_id' => $escort_id,
                        ]);
                    } else {
                        return redirect()->back()->withErrors(['error' => 'Failed to upload picture ']);
                    }
                }
            }

            return redirect()->route('escorts.myPictures', $escort_id)->with('success', 'Picture uploaded successfully.');
        } catch (\Exception $e) {
            // Handle any exception that might occur during the process
            return redirect()->back()->withErrors(['error' => 'An error occurred while uploading your pictures. Please try again.']);
        }
    }



    public function add_escorts_myVideos(Request $request, $escort_id)
    {
        $currentVideoCount = Media::where('escort_id', $escort_id)
            ->where('type', $request->media_type_video) // Assuming you store image type in 'type'
            ->count();

        $newVideoCount = count($request->file('videos'));

        if (($currentVideoCount + $newVideoCount) > 30) {
            return redirect()->back()->with('error', 'You can only upload a maximum of 30 videos.');
        }
        // Update validation rules to handle array input for 'videos'
        $request->validate([
            'videos' => 'required|array',
            'videos.*' => 'file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000', // Validate each file in the array         
        ]);

        try {
            // Check if 'videos' is an array (multiple files uploaded)
            if (is_array($request->file('videos'))) {
                // Handle multiple files
                foreach ($request->file('videos') as $vdo) {
                    $originalVdoName = $vdo->getClientOriginalName();
                    $vdoName = time() . '_' . $originalVdoName;

                    // Try to move the video to the public path
                    $uploadSuccess = $vdo->move(public_path('videos'), $vdoName);

                    // Check if the upload succeeded
                    if ($uploadSuccess) {
                        // Save the media record if upload is successful
                        Media::create([
                            'name' => $vdoName,
                            'type' => $request->media_type_video,
                            'escort_id' => $escort_id,
                        ]);
                    } else {
                        return redirect()->back()->withErrors(['error' => 'Failed to upload video: ' . $originalVdoName]);
                    }
                }
            }

            return redirect()->route('escorts.myVideos', $escort_id)->with('success', 'Video uploaded successfully.');
        } catch (\Exception $e) {
            // Handle any exception that might occur during the process
            return redirect()->back()->withErrors(['error' => 'An error occurred while uploading your videos. Please try again.']);
        }
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
