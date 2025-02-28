<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request) {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'password' => bcrypt($request->password)
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    
    
    
    
    }


    public function login(LoginFormRequest $request) {
   
        $credentials = $request ->validated();

    // attempt to log the user in
    if (Auth::attempt($credentials)) {

        //authentication passed
        $user = Auth::user();

        //create a token 
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    return response()->json([
        'error' => 'Invalid login details'
    ], 401);
    }

    
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();
    
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }



 

}

