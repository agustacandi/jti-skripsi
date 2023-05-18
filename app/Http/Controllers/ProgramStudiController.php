<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodies = DB::table('program_studis')->get();
        return view('dashboard.prodi.index', compact('prodies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prodi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:program_studis',
            'code' => 'required|string|unique:program_studis',
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('program-studi.index')->with('message', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramStudi $programStudi)
    {
        return view('dashboard.prodi.detail', compact('programStudi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramStudi $programStudi)
    {
        return view('dashboard.prodi.edit', compact('programStudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $programStudi->update($request->all());
        return redirect()->route('program-studi.index')->with('message', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudi $programStudi)
    {
        $programStudi->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
