<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BroadcastController;
use App\Http\Controllers\API\SkripsiController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user/profile', [AuthController::class, 'auth']);
    Route::get('/user/status', [AuthController::class, 'auth']);
    Route::get('/user/dosen-pembimbing', [UserController::class, 'getDosen']);
    Route::get('/broadcasts', [BroadcastController::class, 'all']);
    Route::get('/skripsi/history', [SkripsiController::class, 'history']);
    Route::post('/skripsi/input-ta', [SkripsiController::class, 'input']);
});
