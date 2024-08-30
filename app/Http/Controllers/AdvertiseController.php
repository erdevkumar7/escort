<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
class AdvertiseController extends Controller
{
    public function index()
    {
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

    public function show($id)
    {
        $ads = Advertise::findOrFail($id); // Retrieve the advertisement by its ID or fail
        return view('ads.show', compact('ads'));
    }

    public function ads_edit($id)
    {
        $ads = Advertise::findOrFail($id); // Retrieve the advertisement by its ID or fail
        return view('ads.edit', compact('ads')); // Pass the advertisement to the edit view
    }

    public function ads_edit_submit(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'time_duration' => 'required|integer',
            'price' => 'required|numeric',
            'remark' => 'nullable|string',
            'description' => 'required|min:20'
        ]);

        $advertise = Advertise::findOrFail($id); // Retrieve the advertisement by its ID or fail
        $advertise->update($request->all()); // Update the advertisement with the validated data

        return redirect()->route('admin.allAds')->with('success', 'Advertisement updated successfully!');
    }

    public function ads_delete($id)
    {
        $ads = Advertise::findOrFail($id); // Retrieve the advertisement by its ID or fail
        $ads->delete(); // Delete the advertisement

        return redirect()->route('admin.allAds')->with('success', 'Advertisement deleted successfully!');
    }
}
