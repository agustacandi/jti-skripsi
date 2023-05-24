<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class SkripsiController extends Controller
{
    public function input(Request $request) {
        try {
            $request->validate([
                'judul_1' => 'required|string|unique:skripsis|max:200',
                'output_1' => 'required|string|max:255',
                'deskripsi_1' => 'required|string|max:255',
                'judul_2' => 'required|string|unique:skripsis|max:200',
                'output_2' => 'required|string|max:255',
                'deskripsi_2' => 'required|string|max:255',
                'pembimbing_1' => 'required',
                'pembimbing_2' => 'required',
            ]);

            $data = $request->all();

            if ($request->judul_1 && $request->judul_2) {
                $judul1 = explode(' ', $request->judul_1);
                $judul2 = explode(' ', $request->judul_2);

                if (count($judul1) > 20 || count($judul2) > 20) {
                    return ResponseFormatter::error(null, 'Judul TA tidak boleh lebih dari 20 kata.');
                }
            }

            if ($request->pembimbing_1 == $request->pembimbing_2) {
                return ResponseFormatter::error(null, 'Dosen pembimbing 1 dan 2 tidak boleh sama.');
            }

            $data['user_id'] = Auth::user()->id;

            $skripsi = Skripsi::create($data);

            return ResponseFormatter::success($skripsi, 'Berhasil input TA.', 201);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error' => $error
            ], 'Terjadi kesalahan pada saat input TA', 500);
        }
    }
}
