<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function add_badge_form(){
        return view("badge.add");
    }

    public function add_badge_form_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'how_is_it_applied' => 'required',
            'hexa_color' => 'required',
            'description' => 'required|min:30',
            'design_inspiration' => 'nullable',
        ]);

        Badge::create($request->all());
        return redirect()->route('admin.add.badge_form')->with('success', 'Badge created successfully.');
    }
}
