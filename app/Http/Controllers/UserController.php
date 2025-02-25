<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit-profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
         // Validate the request data
         $request->validate([
            'name' => 'required|string|max:200|min:5',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => [
                'required',
                'numeric',
                'unique:users,phone_number,' . $user->id,
                'regex:/^(010|011|012|015)\d{8}$/'
            ],
            'address' => 'required|string|max:200|min:5',
        ]);

        // Update the user's profile
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        // Redirect back to the profile page with a success message
        return redirect()->route('users.show', $user->id)->with('success', 'Profile updated successfully!');
    }
    }

