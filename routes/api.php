<?php

use App\Http\Controllers\AktifitasMahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KrsMahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileMahasiswaController;
use App\Http\Controllers\SemesterController;
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
Route::get('/nilaimahasiswa/{semester}', [NilaiMahasiswaController::class, 'GetNilaiMahasiswa']); // get transkrip nilai mahasiswa
Route::get('/transkrip', [TranskripNilaiController::class, 'GetTranskripNilai']); // get transkrip nilai mahasiswa
Route::get('/profile', [ProfileMahasiswaController::class, 'GetProfileMahasiswa']); // reoute profile mahasiswa
Route::get('/krsmahasiswa/{semester}', [KrsMahasiswaController::class, 'GetKrsMahasiswa']); // reoute krs mahasiswa
Route::get('/aktifitas', [AktifitasMahasiswaController::class, 'GetAktifitasMahasiswa']); // route aktifitas mahasiswa
Route::get('/datasemster', [SemesterController::class, 'GetDataSemester']); //route data semester
Route::get('/matakuliah', [MatakuliahController::class, 'GetAllMatakuliah']); //route data matakuliah
Route::post('/pengajuansurat', [PengajuanSuratController::class, 'PengajuanSurat']); // route pengajuan surat
Route::post('/passwordchange', [AuthController::class, 'changePassword']); //route post rubah password
