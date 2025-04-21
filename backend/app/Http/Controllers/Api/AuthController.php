<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required:min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['statusCode' => 201, 'message' => 'Register successfully.'], 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['statusCode' => 401, 'message' => 'Email or password wrong.'], 401);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json(
            [
                'statusCode' => 200,
                'message' => 'Register successfully.',
                'data' => $user,
                'token' => $token
            ],
            200
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(
            [
                'statusCode' => 200,
                'message' => 'User logged out.',
            ],
            200
        );
    }
}
