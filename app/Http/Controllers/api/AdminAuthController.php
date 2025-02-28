<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request) {
   
        $credentials = $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required'
        ]);

    // attempt to log the user in
    if (Auth::guard('admin')->attempt($credentials)) {

        //authentication passed
        $user = Auth::guard('admin')->user();

        //create a token 
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,

        ]);
    }

    return response()->json([
        'error' => 'Invalid login details'
    ], 401);
    }
}
