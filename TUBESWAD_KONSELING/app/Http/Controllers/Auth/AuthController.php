<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerInfo()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'endpoint' => '/api/auth/register',
                'method' => 'POST',
                'required_fields' => [
                    'name' => 'string, required, max:255',
                    'email' => 'string, required, email, unique:users',
                    'password' => 'string, required, min:8, confirmed',
                    'password_confirmation' => 'string, required, same as password'
                ],
                'description' => 'Register a new user account using Laravel Breeze'
            ]
        ], 200);
    }

    public function loginInfo()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'endpoint' => '/api/auth/login',
                'method' => 'POST',
                'required_fields' => [
                    'email' => 'string, required, email',
                    'password' => 'string, required'
                ],
                'description' => 'Authenticate user and return Sanctum token'
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'success' => true,
                'data' => [
                    'message' => 'Successfully logged out'
                ]
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'User not authenticated'
        ], 401);
    }
}