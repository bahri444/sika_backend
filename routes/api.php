<?php

use App\Http\Controllers\AktifitasMahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KrsMahasiswaController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\TranskripNilaiController;
use App\Models\PengajuanSurat;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

// Route::middleware('atuh:api')->group(function () {
// });

Route::get('/berita', [BeritaController::class, 'GetNews']);

Route::controller(NilaiMahasiswaController::class)->group(function () {
    Route::get('nilaimahasiswa', 'GetNilaiMahasiswa');
});
Route::get('/transkrip', [TranskripNilaiController::class, 'GetTranskripNilai']); // get transkrip nilai mahasiswa
Route::get('/profile', [ProfileMahasiswaController::class, 'GetProfileMahasiswa']); // reoute profile mahasiswa
Route::post('/pengajuansurat', [PengajuanSurat::class, 'PengajuanSurat']); // route pengajuan surat
Route::get('/krsmahasiswa', [KrsMahasiswaController::class, 'GetKrsMahasiswa']); // reoute krs mahasiswa
Route::get('/aktifitas', [AktifitasMahasiswaController::class, 'GetAktifitasMahasiswa']); // route aktifitas mahasiswa
