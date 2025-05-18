<?php

namespace App\Http\Controllers;

use App\Models\User;
use Pest\Plugins\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function editProfile(Request $request) 
{
    $user = Auth::user();

    if (!$user || !($user instanceof User)) {
        abort(403, 'User not authenticated or invalid model.');
    }

    $validated = $request->validate([
        'full_name' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|string|max:15',
    ]);

    $user->full_name = $validated['full_name'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'];

    $user->save(); // Should work if $user is a proper Eloquent model

    return redirect()->route('profile')->with('success', 'Profile updated successfully');
}

    public function addProfilePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('profile_photo')) {

        $user = Auth::user();

        if (!$user || !($user instanceof User)) {
            abort(403, 'User not authenticated or invalid model.');
        }

        // Delete old photo
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }

        // Store new photo
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo_path = $path;
        $user->profile_photo_url = Storage::url($path);
        
        $user->save();
    }

    return redirect()->route('profile')->with('success', 'Profile photo updated.');
}

public function deleteProfilePhoto()
{
    $user = Auth::user();

    if (!$user || !($user instanceof User)) {
        abort(403, 'User not authenticated or invalid model.');
    }
    

    if ($user->profile_photo_path) {
        // Delete the file
        Storage::disk('public')->delete($user->profile_photo_path);

        // Clear DB fields
        $user->profile_photo_path = null;
        $user->profile_photo_url = null;
        $user->save();
    }

    return redirect()->back()->with('status', 'Profile picture removed.');
}
}
