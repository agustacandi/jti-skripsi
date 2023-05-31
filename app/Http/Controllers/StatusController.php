<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::with(['mahasiswa'])->get();
        dd($status);
        return view('dashboard.status.list', compact('status'));
    }

    public function addStatus()
    {
        $statuses = Status::with(['mahasiswa'])->where('user_id', Auth::user()->id)->get();
        $status = Status::with(['mahasiswa'])->where('user_id', Auth::user()->id)->first();
        return view('dashboard.status.mahasiswa', compact('statuses', 'status'));
    }

    public function storeStatus(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
        ]);

        Status::create($request->all());

        return redirect()->route('status.add')->with('message', 'Berhasil menambahkan status.');
    }
}