<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
