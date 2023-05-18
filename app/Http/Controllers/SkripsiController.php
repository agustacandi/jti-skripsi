<?php

namespace App\Http\Controllers;

use App\DataTables\SkripsiDataTable;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkripsiController extends Controller
{
    public function indexInputTA()
    {
        $dosens = DB::table('dosens')->limit(5)->get(['id', 'name']);
        return view('dashboard.skripsi.index', compact('dosens'));
    }

    public function storeInputTA(Request $request) {
        $request->validate([
            'judul_1' => 'required|string|unique:skripsis|max:200',
            'output_1' => 'required|string|max:255',
            'deskripsi_1' => 'required|string|max:255',
            'judul_2' => 'required|string|unique:skripsis|max:200',
            'output_2' => 'required|string|max:255',
            'deskripsi_2' => 'required|string|max:255',
            'pembimbing_1' => 'required',
            'pembimbing_2' => 'required',
            'user_id' => 'required',
        ]);

        if($request->judul_1 && $request->judul_2) {
            $judul1 = explode(' ', $request->judul_1);
            $judul2 = explode(' ', $request->judul_2);

            if(count($judul1) > 20 || count($judul2) > 20) {
                return redirect()->route('input.ta')->with('message', 'Judul TA tidak boleh lebih dari 20 kata.');
            }
        }

        if($request->pembimbing_1 == $request->pembimbing_2) {
            return redirect()->route('input.ta')->with('message', 'Dosen pembimbing 1 dan 2 tidak boleh sama.');
        }

        Skripsi::create($request->all());

        return redirect()->route('input.ta')->with('message', 'berhasil menambahkan data');
    }
    public function historyTA()
    {
        $dosens = DB::table('dosens')->limit(5)->get(['id', 'name']);
        return view('dashboard.skripsi.history', compact('dosens'));
    }

    public function listTA(SkripsiDataTable $dataTable) {
        return $dataTable->render('dashboard.skripsi.list');
    }
}
