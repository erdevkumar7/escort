<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
class AdvertiseController extends Controller
{
    public function index(){
        $advertises = Advertise::all(); // Retrieve all advertisements
        return view('ads.all-ads', compact('advertises'));
    }

    public function create()
    {
        return view('ads.create'); // Return the view for creating a new advertisement
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'time_duration' => 'required|integer',
            'price' => 'required|numeric',
            'remark' => 'nullable|string',
            'description' => 'required|min:20'
        ]);

        // Create a new advertisement with the validated data
        Advertise::create([
            'name' => $request->name,
            'time_duration' => $request->time_duration,
            'price' => $request->price,
            'remark' => $request->remark,
            'description' => $request->description
        ]);

        return redirect()->route('admin.allAds')->with('success', 'Advertisement created successfully!');
    }
}
