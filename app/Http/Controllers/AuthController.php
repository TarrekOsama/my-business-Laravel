<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // validate the form data
        $request->validate([
            'name' => 'required|string|max:200|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        // create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // redirect to home page
        return redirect()->route('auth.login.form');
    }
}
