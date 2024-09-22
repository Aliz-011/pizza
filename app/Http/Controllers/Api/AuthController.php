<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'confirmed']
        ]);

        $hashedPassword = Hash::make($credentials['password'], [
            'time' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
            'thread' => PASSWORD_ARGON2_DEFAULT_THREADS,
            'memory' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $hashedPassword
        ]);

        $token = $user->createToken('access_token', ['*'], now()->addWeek());

        return response()->json([
            'token' => $token->plainTextToken,
        ], 201);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $request->session()->regenerate();

        $token = $user->createToken('access_token', ['*'], now()->addWeek());

        return response()->json([
            'message' => 'Logged in',
            'token' => $token->plainTextToken,
        ], 201);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json();
    }
}
