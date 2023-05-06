<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function pengajuan(Request $request)
    {
        return view('dashboard.skripsi.index');
    }
}