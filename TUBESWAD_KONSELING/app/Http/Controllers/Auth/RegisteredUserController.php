<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Sesuai rute web GET /register
    }

    public function store(Request $request)
    {
        try {
            // Pastikan data divalidasi dengan benar dari berbagai format
            $data = $request->all();
            $request->merge($data); // Memastikan data dari form-urlencoded atau JSON

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user); // Untuk sesi web

            if ($request->header('Accept') === 'application/json' || $request->is('api/*')) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'success' => true,
                    'data' => [
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                        ],
                        'token' => $token,
                        'message' => 'User registered successfully'
                    ]
                ], 201);
            }

            return redirect()->intended('/dashboard');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->validator->errors()->first()
            ], 422); // Gunakan 422 untuk error validasi
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage()
            ], 500);
        }
    }
}