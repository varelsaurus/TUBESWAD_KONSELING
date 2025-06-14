<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($request->header('Accept') === 'application/json' || $request->is('api/*')) {
                    $token = $user->createToken('auth_token')->plainTextToken;
                    return response()->json([
                        'success' => true,
                        'data' => [
                            'token' => $token,
                            'user' => [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                            ],
                            'message' => 'User logged in successfully'
                        ]
                    ], 200);
                }

                return redirect()->intended('/dashboard');
            }

            if ($request->header('Accept') === 'application/json' || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }

            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed: ' . $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            if ($request->header('Accept') === 'application/json' || $request->is('api/*')) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return response()->json([
                    'success' => true,
                    'data' => [
                        'message' => 'Successfully logged out'
                    ]
                ], 200);
            }

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed: ' . $e->getMessage()
            ], 500);
        }
    }
}