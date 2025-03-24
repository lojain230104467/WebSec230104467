<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show the user's profile
    public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('profile.index', compact('user'));
    }

    // Handle password update
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Check if old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }

        // Manually hash the new password before saving
        $user->password = Hash::make($request->new_password);
        $user->save(); // Ensure the password is updated correctly

        return back()->with('success', 'Password updated successfully.');
    }
}
