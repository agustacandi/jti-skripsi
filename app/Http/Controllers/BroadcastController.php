<?php

namespace App\Http\Controllers;

use App\DataTables\BroadcastDataTable;
use App\Models\Broadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BroadcastDataTable $dataTable)
    {
        $broadcasts = DB::table('broadcasts')->where('dosen_id', Auth::guard('dosen')->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('dashboard.broadcast.index', compact('broadcasts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.broadcast.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'body' => 'required|string',
            'is_published' => 'boolean',
            'dosen_id' => 'required'
        ]);

        $isChecked = $request->has('is_published');

        $data = $request->all();

        $data['is_published'] = $isChecked;

        Broadcast::create($data);

       return redirect()->route('broadcast.index')->with('message', 'Berhasil menambahkan broadcast.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Broadcast $broadcast)
    {
        return view('dashboard.broadcast.detail', compact('broadcast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Broadcast $broadcast)
    {
        return view('dashboard.broadcast.edit', compact('broadcast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Broadcast $broadcast)
    {
        $broadcast->update($request->all());

        return redirect()->route('broadcast.index')->with('message', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broadcast $broadcast)
    {
        $broadcast->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
