<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        //dd($profile->photo); // Check this value
        return view('profile.show', compact('profile'));
    }

    // Show the profile edit form
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile ?: new Profile(['user_id' => $user->id]);

        return view('profile.edit', compact('profile'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $profile = $user->profile ?: new Profile(['user_id' => $user->id]);

        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update profile fields
        $profile->phone = $validated['phone'];
        $profile->address = $validated['address'];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($profile->photo) {
                Storage::delete($profile->photo);
            }

            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $profile->photo = $photoPath;
        }

        // Save the profile
        $profile->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}