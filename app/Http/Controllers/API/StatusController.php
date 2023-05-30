<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        try {
            $statuses = Status::where('user_id', Auth::user()->id)->get();
            return ResponseFormatter::success($statuses, 'Berhasil menambahkan status', 201);
        } catch (Exception $error) {
            return ResponseFormatter::error($error, 'Gagal menambahkan status', 500);
        }
    }

    public function storeStatus(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $status = Status::create($data);
            return ResponseFormatter::success($status, 'Berhasil menambahkan status', 201);
        } catch (Exception $error) {
            return ResponseFormatter::error($error, 'Gagal menambahkan status', 500);
        }
    }
}
