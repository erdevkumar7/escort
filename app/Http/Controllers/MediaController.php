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

            return redirect()->back()->with('success', 'Picture uploaded successfully.');
        } catch (\Exception $e) {
            // Handle any exception that might occur during the process
            return redirect()->back()->withErrors(['error' => 'An error occurred while uploading your pictures. Please try again.']);
        }
    }



    public function add_escorts_myVideos(Request $request, $escort_id)
    {
        // Update validation rules to handle single video and thumbnail
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,mkv,flv,3gp,avi,mwv,ogg,qt|max:20000',
            'thumb_nail' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048', // Thumbnail validation
        ]);

        try {
            // Handle thumbnail upload
            if ($request->file('thumb_nail')) {
                $thumb_nail = $request->file('thumb_nail');
                $thumb_nailName = time() . '_' . $thumb_nail->getClientOriginalName();
                $thumb_nail->move(public_path('images/thumb_nails'), $thumb_nailName);
            } else {
                $thumb_nailName = null;
            }
            // Handle video upload
            if ($request->file('video')) {
                $video = $request->file('video');
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('videos'), $videoName);
            } else {
                $videoName = null;
            }

            // Create a new instance of Media
            $media = new Media();
            $media->name = $videoName;
            $media->type = 'video';  // Assuming 'video' is the media type
            $media->escort_id = $escort_id;
            $media->thumb_nail = $thumb_nailName;

            // Save the media instance
            $media->save();

            // Redirect with success message
            return redirect()->route('escorts.myVideos', $escort_id)->with('success', 'Video uploaded successfully.');
        } catch (\Exception $e) {
            // Handle any exception that occurs during the process
            return redirect()->back()->withErrors(['error' => 'An error occurred while uploading your video and thumbnail. Please try again.']);
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
            // video delete
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
            // thumbnail delete   
            if($media->thumb_nail !== null){
                $thumbNailPath = public_path('images/thumb_nails') . '/' . $media->thumb_nail;
                if (file_exists($thumbNailPath)) {
                    unlink($thumbNailPath);
                }
            }      

            $media->delete();
            return redirect()->back()->with('success', 'video deleted successfully.');
        } else {
            // If the media record is not found, return with an error message
            return redirect()->back()->with('error', 'Media record not found or you do not have permission to delete this record.');
        }
    }
}
