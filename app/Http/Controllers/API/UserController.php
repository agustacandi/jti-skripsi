<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getDosen(Request $request)
    {
        try {
            $dosen = DB::table('dosens')->paginate($request->input('limit'));
            return $dosen;
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Failed get data', 500);
        }
    }
    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return ResponseFormatter::success($user, 'Berhasil mengganti password', 200);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Failed get data', 500);
        }
    }
}