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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Broadcast $broadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Broadcast $broadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Broadcast $broadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broadcast $broadcast)
    {
        //
    }
}
