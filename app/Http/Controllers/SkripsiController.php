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
        $skripsi = Skripsi::where('user_id', auth()->user()->id)->first();
        $dosens = DB::table('dosens')->limit(5)->get(['id', 'name']);
        return view('dashboard.skripsi.index', compact('dosens', 'skripsi'));
    }

    public function storeInputTA(Request $request)
    {
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

        if ($request->judul_1 && $request->judul_2) {
            $judul1 = explode(' ', $request->judul_1);
            $judul2 = explode(' ', $request->judul_2);

            if (count($judul1) > 20 || count($judul2) > 20) {
                return redirect()->route('input.ta')->with('message', 'Judul TA tidak boleh lebih dari 20 kata.');
            }
        }

        if ($request->pembimbing_1 == $request->pembimbing_2) {
            return redirect()->route('input.ta')->with('message', 'Dosen pembimbing 1 dan 2 tidak boleh sama.');
        }

        Skripsi::create($request->all());

        return redirect()->route('input.ta')->with('message', 'berhasil menambahkan data');
    }
    public function historyTA()
    {
        $skripsi = Skripsi::with(['user'])->where('user_id', auth()->user()->id)->get();
        return view('dashboard.skripsi.history', compact('skripsi'));
    }

    public function listTA(SkripsiDataTable $dataTable)
    {
        return $dataTable->render('dashboard.skripsi.progresmhs');
    }

    public function listProgresMhs(SkripsiDataTable $dataTable)
    {
        return $dataTable->render('dashboard.skripsi.progresmhs');
    }

    public function indexStatus()
    {
        $status = DB::table('statuses')->get(['id', 'name']);
        return view('dashboard.skripsi.status', compact('status'));
    }

    public function indexMonitoring()
    {
        $monitoring = DB::table('monitoring')->get();
        $progress = DB::table('monitoring')->where('user_id', auth()->user()->id)->sum('progress');
        return view('dashboard.skripsi.monitoring', compact('monitoring', 'progress'));
    }

    public function addMonitoring(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:200',
            'progress' => 'required|integer'
        ]);

        DB::table('monitoring')->insert([
            'deskripsi' => $request->deskripsi,
            'progress' => $request->progress,
            'user_id' => auth()->user()->id,
            'dosen_id' => auth()->user()->dosen_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('monitoring.ta')->with('message', 'Berhasil menambahkan data.');


        // $monitoring = DB::table('monitoring')->get(['deskripsi']);
        // return view('dashboard.skripsi.monitoring', compact('monitoring'));
    }

    public function indexPengajuan()
    {
        $pengajuan = DB::table('pengajuan')->get('id', 'name');
        return view('dashboard.skripsi.monitoring', compact('pengajuan'));
    }
}
