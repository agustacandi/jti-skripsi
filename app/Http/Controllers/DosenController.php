<?php

namespace App\Http\Controllers;

use App\DataTables\DosenDataTable;
use App\Models\Dosen;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DosenDataTable $dataTable)
    {
        return $dataTable->render('dashboard.dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodies = DB::table('program_studis')->get(['id', 'name']);
        return view('dashboard.dosen.add', compact('prodies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $request->validated();
        $data = $request->all();

        if ($request->file('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }

        $data['password'] = bcrypt($request->password);

        Dosen::create($data);

        return redirect()->route('dosen.index')->with('message', 'Berhasil menambahkan data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dashboard.dosen.detail', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dashboard.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $data = $request->all();
        if ($request->file('avatar')) {
            if ($dosen->avatar != '') {
                Storage::delete($dosen->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $dosen->update($data);

        return redirect()->route('dosen.index')->with('message', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
