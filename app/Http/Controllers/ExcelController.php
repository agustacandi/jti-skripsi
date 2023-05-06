<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
    }
}