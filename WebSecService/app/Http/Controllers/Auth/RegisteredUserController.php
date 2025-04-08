<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'Customer', // Default role
    ]);

    // Assign default 'Customer' role
    $user->assignRole('Customer');

    // Login user if needed
    auth()->login($user);

    return redirect()->route('dashboard'); // or wherever you want
}
