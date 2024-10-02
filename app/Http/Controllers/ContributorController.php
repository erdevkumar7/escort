<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ContributorController extends Controller
{
    public function getAllContributors(Request $request)
    {
        $query = DB::table('contributors')->orderBy('created_at', 'desc');     
        $allContributors = $query->get();
        // dd($allContributors);
        return view('contributor.all', compact('allContributors'));
    }

    public function addContributorForm()
    {
        return view('contributor.add');
    }

    public function addContributorFormSubmit(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:contributors',
            'password' => 'required|min:8|confirmed', // Fixed the validation rule
            'role' => 'required|string',
            'address' => 'nullable|string',
            'description' => 'required|min:30',
            'phone_number' => 'required|string'
        ]);
        //original_password
        $validated['original_password'] = $validated['password'];
        // Hash the password before saving
        $validated['password'] = Hash::make($validated['password']);
        // Create the contributor
        $contributor = Contributor::create($validated);

        // Check if the contributor is created successfully
        if ($contributor) {
            return redirect()->route('admin.getAllContributors')->with('success', 'Contributor Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add contributor. Please try again.');
        }
    }


    public function viewContributor($contributor_id)
    {
        $contributor = Contributor::find($contributor_id);
        if (!$contributor) {
            return redirect()->back()->with('error', 'No Contributor Found!');
        }

        return view('contributor.view', compact('contributor'));
    }

    public function editContributorForm($contributor_id)
    {
        $contributor = Contributor::find($contributor_id);
        if (!$contributor) {
            return redirect()->back()->with('error', 'No Contributor Found!');
        }

        return view('contributor.edit', compact('contributor'));
    }

    public function editContributorFormSubmit(Request $request, $contributor_id)
    {
        // Find the contributor by ID
        $contributor = Contributor::findOrFail($contributor_id);

        // Validation
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:contributors,email,' . $contributor->id, // Ignore current contributor's email
            'password' => 'nullable|min:8|confirmed', // Password is optional during updates
            'role' => 'required|string',
            'address' => 'nullable|string',
            'description' => 'required|min:30',
            'phone_number' => 'required|string'
        ]);

        // Check if password field is filled, if yes, hash it
        if ($request->filled('password')) {
            //original_password
            $validated['original_password'] = $validated['password'];
            $validated['password'] = Hash::make($request->password);
        } else {
            // If password is not filled, remove it from the validated data so it won't be updated
            unset($validated['password']);
        }

        // Update contributor details
        $contributor->update($validated);

        // Return with success message
        return redirect()->route('admin.getAllContributors')->with('success', 'Contributor Updated Successfully!');
    }

    public function deleteContributor($contributor_id)
    {
        // Find the contributor by ID, or fail if not found
        $contributor = Contributor::findOrFail($contributor_id);

        // Delete the contributor
        $contributor->delete();

        // Redirect back with success message
        return redirect()->route('admin.getAllContributors')->with('success', 'Contributor Deleted Successfully!');
    }



    public function showLoginForm()
    {
        return view('contributor.login');
    }

    public function contributor_login_submit(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // dd($credential);
        if (Auth::guard('contributor')->attempt($credential)) {
            // dd(Auth::guard('contributor')->user());
            return redirect()->intended('/contributor/my-dashboard');
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function contributorMyDashboard()
    {
        return view('contributor-user.my-dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('contributor')->logout();
        return redirect('/contributor/login');
    }
}
