<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BadgeController extends Controller
{
    public function allbadges()
    {
        $allbadges = DB::table("badges")->get();
        return view('badges.all', compact('allbadges'));
    }
    // add_badge_form
    public function add_badge_form()
    {   $allbadges = DB::table("badges")->get();
        return view("badges.add", compact("allbadges"));
    }

    public function add_badge_form_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'how_is_it_applied' => 'required',
            'hexa_color' => 'required',
            'description' => 'required|min:30',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        //handle image
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images/badge_icons'), $imageName);
        }

        $data['icon'] = $imageName;
        Badge::create($data);
        return redirect()->route('admin.allbadges')->with('success', 'Badge created successfully.');
    }

    public function badge_edit($id)
    {
        $badge = Badge::find($id);
        return view('badges.edit', compact('badge'));
    }

    public function badge_edit_submit(Request $request, $id)
    {
        $badge = Badge::find($id);

        $request->validate([
            'how_is_it_applied' => 'required',
            'hexa_color' => 'required',
            'description' => 'required|min:30',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        //handle image
        if ($request->hasFile('icon')) {
            // Delete the old image if it exists
            if ($badge->icon) {
                $oldImagePath = public_path('images/badge_icons') . '/' . $badge->icon;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('icon');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images/badge_icons'), $imageName);
        }

        $data['icon'] = $imageName;
        $badge->update($data);

        return redirect()->route('admin.allbadges')->with('success', 'Badge Update successfully.');
    }
    // show badge-by-id
    public function show($id){
        $badge = Badge::find($id);
        return view('badges.show', compact('badge'));
    }

    public function badge_delete($id)
    {
        // $badge = findAndFails($id);
        $badge = Badge::findOrFail($id);
        // Delete the associated image if it exists
        if ($badge->icon) {
            $imagePath = public_path('images/badge_icons') . '/' . $badge->icon;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the badge from the database
        $badge->delete();
        return redirect()->route('admin.allbadges')->with('success', 'badge deleted successfully.');
    }
}
