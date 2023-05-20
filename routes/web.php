<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\SkripsiController;
use App\Imports\MahasiswaImport;
use App\Models\ProgramStudi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login')->middleware('guest');

// Auth Route
Route::get('/login', function () {
    return view('layouts.auth');
})->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:web,dosen')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        // dd(Auth::guard('dosen')->user()->avatar);
        $mahasiswa = DB::table('users')->count();
        $dosen = DB::table('dosens')->count();
        $skripsi = DB::table('skripsis')->count();
        return view('dashboard.home', compact('mahasiswa', 'dosen', 'skripsi'));
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        // Dashboard Mahasiswa Resource Route
        Route::resource('/mahasiswa', MahasiswaController::class);
        Route::post('/mahasiswa/import', function (Request $request) {
            $request->validate([
                'file' => 'required',
            ]);
            Excel::import(new MahasiswaImport, $request->file('file'));
            return redirect()->route('mahasiswa.index')->with('message', 'Berhasil mengimpor data.');
        })->name('mahasiswa.import');

        Route::get('/mahasiswa/download-format-excel', function () {
            return Storage::download(public_path('assets/file/format-excel-mahasiswa.xlsx'));
        })->name('excel.mahasiswa');

        // Dashboard Dosen Resource Route
        Route::resource('/dosen', DosenController::class);

        // Dashboard Broadcast Resource Route
        Route::resource('/broadcast', BroadcastController::class);

        // Dashboard Program Studi Resource Route
        Route::resource('/program-studi', ProgramStudiController::class);
    });

    // Dashboard Skripsi Route
    Route::redirect('/dashboard/skripsi', '/dashboard/skripsi/pengajuan-judul');

    Route::prefix('dashboard/skripsi')->group(function () {

        Route::get('input-ta', [SkripsiController::class, 'indexInputTA'])->name('input.ta');
        Route::post('input-ta', [SkripsiController::class, 'storeInputTA'])->name('store.ta');

        Route::get('history-ta', [SkripsiController::class, 'historyTA'])->name('history.ta');
        Route::get('list-ta', [SkripsiController::class, 'listTA'])->name('list.ta');

        Route::get('status', [SkripsiController::class, 'indexStatus'])->name('index.status');

        Route::get('monitoring', [SkripsiController::class, 'indexMonitoring'])->name('index.monitoring');

        Route::get('pengajuan', [SkripsiController::class, 'indexPengajuan'])->name('index.pengajuan');
    });


    // Dashboard Profile
    Route::get('profile', function () {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        } else if (Auth::guard('dosen')->check()) {
            $user = Auth::guard('dosen')->user();
        }

        return view('dashboard.profile', compact('user'));
    })->name('profile');
});