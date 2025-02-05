<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
        ]);

      

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => explode("@",$request->email)[0],
        ]);

        // Create token
        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'User successfully registered.',
            'user' => $user,
            'token' => $token
        ]);
    }

    // Login method
    public function login(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

             // Check if the user exists
             $user = User::where('email', $request->email)->first();

             if (!$user || !Hash::check($request->password, $user->password)) {
                 return response()->json(['error' => 'Unauthorized'], 401);
             }
     
             // Issue a Sanctum token
             $token = $user->createToken('YourAppName')->plainTextToken;
     
             return response()->json([
                'message' => 'User successfully logged in.',
                'user' => $user,
                'token' => $token
            ]);
    

       
    }
}
