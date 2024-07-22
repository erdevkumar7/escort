<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminAgencyController extends Controller
{
    //todo: Get All agency
    public function allagencies()
    {
        $allagencies = DB::table("agencies")->orderBy('created_at', 'desc')->get();
        return view("agency.all-agency", compact("allagencies"));
    }
    public function addagency_form()
    {
        return view("agency.add-agency");
    }

    public function addagency_form_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:agencies,email',
            'phone_number' => 'required|numeric',
            'address' => 'nullable|string',
            'counter' => 'nullable|string'
        ]);

        $agency = new Agency();

        $agency->name = $request->name;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->phone_number = $request->phone_number;
        $agency->counter = $request->counter;
        $agency->save();

        return redirect()->route('admin.allagencies')->with('success', 'Agency added successfully');
    }

    public function agency($id)
    {
        $agency = Agency::find($id);
        return view('agency.show', compact('agency'));
    }
    public function edit_agency_form($id)
    {
        $agency = Agency::find($id);
        return view('agency.edit', compact('agency'));
    }

    public function edit_agency(Request $request, $id)
    {
        $agency = Agency::find($id);

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
            'counter' => 'nullable|string'
        ]);

        $agency->update($valideData);

        return redirect()->route('admin.allagencies')->with('success', 'Agancy Updated');
    }

    public function delete_agency($id)
    {
        $agency = Agency::find($id);
        if ($agency) {
            $agency->delete();
            return redirect()->route('admin.allagencies')->with('success', 'Agency Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Agency Not Deleted');
        }
    }
}
