<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display user profile
    public function profile()
    {
        $user = auth()->user(); // Assuming you're using Laravel's authentication
        return view('users.profile', compact('user'));
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user(); // Fetch authenticated user
        $user->update($request->only('name', 'email')); // Update name and email, modify fields as needed

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    // Handle checkout process
    public function checkout()
    {
        // Logic for checkout process
        return view('users.checkout');
    }

    // Handle shipping information
    public function ship()
    {
        // Logic for shipping information
        return view('users.ship');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6', // Password validation rules
            'role' => 'required',
        ]);

        // Create the user with hashed password
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash the password
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }
}
