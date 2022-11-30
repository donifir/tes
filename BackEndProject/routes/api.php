<?php

use App\Http\Controllers\PendaftaranSekolahController;
use App\Http\Controllers\ProvinsiKotaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinsi', [ProvinsiKotaController::class, 'getProvinsi']);
Route::get('kabupaten-kota', [ProvinsiKotaController::class, 'getKota']);
Route::get('tipe-sekolah', [ProvinsiKotaController::class, 'getTipe']);

Route::get('data-pendaftaran-sekolah', [PendaftaranSekolahController::class, 'index']);
Route::post('pendaftaran-sekolah', [PendaftaranSekolahController::class, 'store']);
Route::post('pendaftaran-sekolah', [PendaftaranSekolahController::class, 'store']);
Route::get('data-pendaftaran-sekolah/{id}', [PendaftaranSekolahController::class, 'show']);
Route::post('pendaftaran-sekolah/{id}/update', [PendaftaranSekolahController::class, 'update']);
Route::delete('pendaftaran-sekolah/{id}/delete', [PendaftaranSekolahController::class, 'destroy']);





