<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class BroadcastController extends Controller
{
    public function all() {
       try {
            $broadcast = Broadcast::where('dosen_id', Auth::user()->dosen_id)->get();
           return ResponseFormatter::success([
               'broadcast' => $broadcast,
           ], 'Authenticated');
       } catch (Exception $error) {
           return ResponseFormatter::error([
               'message' => 'Something went wrong',
               'error' => $error
           ], 'Authentication failed', 500);
       }
    }
}
