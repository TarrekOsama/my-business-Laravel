<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    //login function
    public function showLoginForm()
    {
        return view('auth.login');
    }

//login function
    public function login(Request $request)
    {
        // validate the form data
        $credentials = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        // attempt to log the user in
        if (Auth::attempt($credentials)) {
            // redirect to home page
            return redirect()->route('home')->with('success', 'logged in successfully');
        } else {
            // redirect back to the login page
            return back()->withErrors([
                'login-error' => 'Invalid email or password'
            ]);
        }
    }

    //logout function

    public function logout()
    {
        // log the user out
        Auth::logout();

        // redirect to home page
        return redirect()->route('home')->with('success', 'logged out successfully');
    }




//register function

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    //register function
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
