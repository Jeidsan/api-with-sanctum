<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
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
            return ApiResponse::unauthorized();
        }

        $user = Auth::user();
        $token = $user->createToken($user->name)->plainTextToken;

        return ApiResponse::success([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ]);
    }
}
