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
    //*****************City Operation *********************//

    public function getAllCity()
    {
        $allcity = City::with('canton')->get();
        return view('canton-city.all-city', ['allcity' => $allcity]);
    }

    public function viewCityDetail($city_id)
    {
        $city = City::find($city_id);
        if (!$city) {
            return redirect()->back()->with('error', 'No Conton Found!');
        }
        return view('canton-city.view-city', compact('city'));
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
        return redirect()->route('admin.getAllCity')->with('success', 'City created Successfully!');
    }

    public function editCityForm($city_id)
    {
        $city = City::with('canton')->find($city_id);
        $allcanton = Canton::orderBy('name', 'asc')->get();
        if (!$city) {
            return redirect()->back()->with('error', 'No City Found!');
        }
        return view('canton-city.edit-city', compact('city', 'allcanton'));
    }

    public function editCityFormSubmit(Request $request, $city_id)
    {
        $city = City::findOrFail($city_id);
        $validateData =  $request->validate([
            "name" => "required|string",
            "canton_id" => "required|string",
            "description" => "nullable|string"
        ]);

        $city->update($validateData);
        return redirect()->route('admin.getAllCity')->with('success', 'City Updated Successfully!');
    }


    public function deleteCity($city_id)
    {
        $city = City::findOrFail($city_id);
        $city->delete();
        return redirect()->route('admin.getAllCity')->with('success', 'City Deleted Successfully!');
    }

    public function deleteConton($conton_id)
    { 
        $canton = Canton::findOrFail($conton_id);
        
        $canton->cities()->delete(); 
        $canton->delete();
 
        return redirect()->route('admin.getAllCanton')->with('success', 'Canton Deleted Successfully!');
    }
}
