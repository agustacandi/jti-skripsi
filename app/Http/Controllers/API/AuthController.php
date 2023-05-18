<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'string']
            ]);


            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Authentication failed', 500);
            }

            $user = User::with(['dosen', 'program_studi'])->where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Invalid credentials', 500);
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication failed', 500);
        }
    }

    public function auth() {
        try {
            $user = User::with(['dosen', 'program_studi'])->where('id', Auth::user()->id)->first();
            return ResponseFormatter::success([
                'user' => $user,
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication failed', 500);
        }
    }
}
