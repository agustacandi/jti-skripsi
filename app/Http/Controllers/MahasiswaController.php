<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodies = DB::table('program_studis')->get(['id', 'name']);
        return view('dashboard.mahasiswa.add', compact('prodies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $request->validated();
        $data = $request->all();

        if ($request->file('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }

        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('mahasiswa.index')->with('message', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $mahasiswa)
    {
        return view('dashboard.mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $mahasiswa)
    {
        $mhs = User::with('program_studi')->findOrFail($mahasiswa->id);
        $prodies = DB::table('program_studis')->where('id', '!=', $mahasiswa->program_studi->id)->get(['id', 'name']);
        return view('dashboard.mahasiswa.edit', compact('mhs', 'prodies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, User $mahasiswa)
    {
        $data = $request->all();
        if ($request->file('avatar')) {
            if ($mahasiswa->avatar != '') {
                Storage::delete($mahasiswa->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatar');
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('message', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data.'
        ]);
    }
}
