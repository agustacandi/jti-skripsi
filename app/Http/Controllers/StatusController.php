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
        return view('dashboard.status.list', compact('status'));
    }

    public function addStatus()
    {
        $statuses = Status::with(['mahasiswa'])->where('user_id', Auth::user()->id)->get();
        $status = Status::with(['mahasiswa'])->where('user_id', Auth::user()->id)->first();
        // dd($status->is_verified);
        return view('dashboard.status.mahasiswa', compact('statuses', 'status'));
    }

    public function storeStatus(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->all();

        $data['dosen_id'] = Auth::guard('web')->user()->dosen_id;

        Status::create($data);

        return redirect()->route('status.add')->with('message', 'Berhasil menambahkan status.');
    }

    public function acceptStatus(string $id)
    {
        dd($id);
        $status = Status::where('id', $id)->first();
        // $request->validate([
        //     'name' => 'required',
        //     'user_id' => 'required',
        // ]);

        // Status::create($request->all());

        return redirect()->route('status.index')->with('message', 'Berhasil menambahkan status.');
    }

    public function rejectStatus(string $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'user_id' => 'required',
        // ]);

        // Status::create($request->all());

        return redirect()->route('status.index')->with('message', 'Berhasil menambahkan status.');
    }
}
