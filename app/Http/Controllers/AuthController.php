<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,editor', // Validate role to be either 'admin' or 'editor'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // Default role
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }


    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'sometimes|required|string|in:admin,editor', // Validate role to be either 'admin' or 'editor'
            'password' => 'sometimes|required|string|min:8|confirmed',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return response()->json(['message' => 'User updated successfully']);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        $user['token'] = $token;
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function users(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }
}
