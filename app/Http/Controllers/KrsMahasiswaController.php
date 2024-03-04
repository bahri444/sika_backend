<?php

namespace App\Http\Controllers;

use App\Models\KrsMahasiswa;
use Illuminate\Http\Request;

class KrsMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetKrsMahasiswa()
    {
        $data_krs = KrsMahasiswa::with('mahasiswa', 'nilai', 'matakuliah', 'kelas', 'pengajar.dosen', 'prodi')->get();
        // dd($data_krs);
        return response()->json([
            'data' => $data_krs,
            'success' => 'data krs mahasiswa pada semester aktif'
        ], 200);
    }
}
