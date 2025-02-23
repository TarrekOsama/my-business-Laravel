<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //admin login function
    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    //admin login function
    public function login(Request $request)
    {
        // validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials)) {
            // redirect to home page
            return redirect()->route('admin.dashboard')->with('success', 'Admin logged in successfully');
        } else {
            // redirect back to the login page
            return back()->withErrors([
                'admin-login-error' => 'Invalid email or password'
            ]);
        }

}

    //admin logout function
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form')->with('success', 'Admin logged out successfully');
    }
}
