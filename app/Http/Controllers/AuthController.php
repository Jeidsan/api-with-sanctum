<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        $attempt = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if ( !$attempt ) {
            return response()->json([ 'error' => 'Unauthorized' ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([ 'token' => $token ], 200);
    }
}
