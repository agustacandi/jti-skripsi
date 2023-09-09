<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\StatusController;
use App\Imports\MahasiswaImport;
use App\Models\Broadcast;
use App\Models\ProgramStudi;
use Illuminate\Database\Console\Migrations\StatusCommand;
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
        $broadcasts = null;

        if (Auth::guard('web')->check()) {
            $broadcasts = Broadcast::with(['dosen'])->where('is_published', true)->where('dosen_id', Auth::guard('web')->user()->dosen_id)->get();
        }
        // dd($broadcasts);
        return view('dashboard.home', compact('mahasiswa', 'dosen', 'skripsi', 'broadcasts'));
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        // Dashboard Mahasiswa Resource Route
        Route::resource('/mahasiswa', MahasiswaController::class);
        Route::resource('/mahasiswa/status', MahasiswaController::class);
        Route::post('/mahasiswa/import', function (Request $request) {
            $request->validate([
                'file' => 'required',
            ]);
            Excel::import(new MahasiswaImport, $request->file('file'));
            return redirect()->route('mahasiswa.index')->with('message', 'Berhasil mengimpor data.');
        })->name('mahasiswa.import');

        Route::post('/mahasiswa/download-format-excel', function () {
            $file = public_path('assets/file/format-excel-mahasiswa.xlsx');
            return response()->download($file, 'format-excel-mahasiswa.xlsx');
        })->name('excel.mahasiswa');

        // Dashboard Dosen Resource Route
        Route::resource('/dosen', DosenController::class);
        Route::post('/dosen/import', function (Request $request) {
            $request->validate([
                'file' => 'required',
            ]);
            Excel::import(new MahasiswaImport, $request->file('file'));
            return redirect()->route('dosen.index')->with('message', 'Berhasil mengimpor data.');
        })->name('dosen.import');

        Route::post('/dosen/download-format-excel', function () {
            $file = public_path('assets/file/format-excel-dosen.xlsx');
            return response()->download($file, 'format-excel-dosen.xlsx');
        })->name('excel.dosen');

        // Dashboard Broadcast Resource Route
        Route::resource('/broadcast', BroadcastController::class);

        // Dashboard Program Studi Resource Route
        Route::resource('/program-studi', ProgramStudiController::class);
    });

    // Dashboard Skripsi Route
    Route::redirect('/dashboard/skripsi', '/dashboard');

    Route::prefix('dashboard/skripsi')->group(function () {

        Route::get('input-ta', [SkripsiController::class, 'indexInputTA'])->name('input.ta');
        Route::post('input-ta', [SkripsiController::class, 'storeInputTA'])->name('store.ta');

        Route::get('history-ta', [SkripsiController::class, 'historyTA'])->name('history.ta');

        Route::get('list-ta', [SkripsiController::class, 'listTA'])->name('list.ta');

        Route::get('list-progres-mahasiswa', [SkripsiController::class, 'listTA'])->name('list.progres.mahasiswa');

        Route::get('status', [SkripsiController::class, 'indexStatus'])->name('status.ta');

        Route::get('monitoring', [SkripsiController::class, 'indexMonitoring'])->name('monitoring.ta');

        Route::post('monitoring', [SkripsiController::class, 'addMonitoring'])->name('monitoring.add');

        Route::get('pengajuan', [SkripsiController::class, 'indexPengajuan'])->name('pengajuan.ta');
    });

    // Dashboard Status Route
    Route::redirect('/dashboard/status', '/dashboard');

    Route::prefix('dashboard/status')->group(function () {

        Route::get('list-status', [StatusController::class, 'index'])->name('status.index');
        // Route::post('list-status/{status}', [StatusController::class, 'index'])->name('status.index');
        Route::get('tambah-status', [StatusController::class, 'addStatus'])->name('status.add');

        Route::post('tambah-status', [StatusController::class, 'storeStatus'])->name('status.store');

        Route::post('accept-status/{id}', [StatusController::class, 'acceptStatus'])->name('status.accept');
        Route::post('reject-status/{id}', [StatusController::class, 'rejectStatus'])->name('status.reject');

        // Route::get('history-ta', [SkripsiController::class, 'historyTA'])->name('history.ta');
        // Route::get('list-ta', [SkripsiController::class, 'listTA'])->name('list.ta');

        // Route::get('status', [SkripsiController::class, 'indexStatus'])->name('status.ta');

        // Route::get('monitoring', [SkripsiController::class, 'indexMonitoring'])->name('monitoring.ta');


        // Route::get('pengajuan', [SkripsiController::class, 'indexPengajuan'])->name('pengajuan.ta');
    });


    // Dashboard Profile
    Route::get('profile', function () {
        $user = null;
        $status = null;

        if (Auth::guard('web')->check()) {
            $user = Auth::user();
            $status = 'mahasiswa';
        } else if (Auth::guard('dosen')->check()) {
            $user = Auth::guard('dosen')->user();
            $status = 'dosen';
        }

        return view('dashboard.profile', compact('user', 'status'));
    })->name('profile');
});
