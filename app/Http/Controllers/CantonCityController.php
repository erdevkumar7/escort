<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\City;
use Illuminate\Http\Request;

class CantonCityController extends Controller
{
    public function getAllCanton()
    {
        $allcanton = Canton::orderBy('name', 'asc')->get();
        return view('canton-city.all-canton', compact('allcanton'));
    }

    
    public function viewCantonDetail($canton_id)
    {
        $canton = Canton::find($canton_id);
        if (!$canton) {
            return redirect()->back()->with('error', 'No Conton Found!');
        }
        return view('canton-city.view-canton', compact('canton'));
    }

    public function addCantonForm()
    {
        return view('canton-city.add-canton');
    }

    public function editCantonForm($canton_id)
    {
        $canton = Canton::find($canton_id);
        if (!$canton) {
            return redirect()->back()->with('error', 'No Conton Found!');
        }
        return view('canton-city.edit-canton', compact('canton'));
    }

    public function addCantonFormSubmit(Request $request)
    {
        $validateData =  $request->validate([
            "name" => 'required|string',
            "short_name" => 'required|string',
            "description" => 'nullable|string'
        ]);

        $canton = Canton::create($validateData);
        return redirect()->route('admin.getAllCanton')->with('success', 'Canton created Successfully!');
    }

    public function editCantonFormSubmit(Request $request, $canton_id)
    {
        $canton = Canton::findOrFail($canton_id);
        $validateData =  $request->validate([
            "name" => 'required|string',
            "short_name" => 'required|string',
            "description" => 'nullable|string'
        ]);

        $canton->update($validateData);
        return redirect()->route('admin.getAllCanton')->with('success', 'Canton Updated Successfully!');
    }

    public function addCityForm()
    {
        $allcanton = Canton::orderBy('name', 'asc')->get();
        return view('canton-city.add-city', compact('allcanton'));
    }

    public function addCityFormSubmit(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required|string",
            "canton_id" => "required|string",
            "description" => "nullable|string"
        ]);

        $city = City::create($validateData);
        return redirect()->back()->with('success', 'City created Successfully!');
    }

    public function deleteConton($conton_id)
    {
        // Find the contributor by ID, or fail if not found
        $conton = Canton::findOrFail($conton_id);

        $conton->delete();
        return redirect()->route('admin.getAllCanton')->with('success', 'Conton Deleted Successfully!');
    }
}
