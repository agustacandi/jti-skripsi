<?php

namespace App\Http\Controllers;

use App\DataTables\BroadcastDataTable;
use App\Models\Broadcast;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BroadcastDataTable $dataTable)
    {
        return $dataTable->render('dashboard.broadcast.index');
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
