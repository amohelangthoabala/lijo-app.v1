<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null; // or throw an exception for better error handling
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return both the user data and the token
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                // Add any other user fields you need here
            ],
        ];
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();
    }
}
