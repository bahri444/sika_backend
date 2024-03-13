<?php

namespace App\Http\Controllers;

use App\Models\KrsMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetKrsMahasiswa()
    {
        $data_krs = KrsMahasiswa::with('mahasiswa', 'nilai', 'matakuliah', 'kelas', 'pengajar.dosen', 'prodi')->where('nipd', Auth::user()->nim)->get();
        $data = [];
        foreach ($data_krs as $key) {
            array_push($data, [
                'nipd' => $key->mahasiswa->nipd,
                'nama_mahasiswa' => $key->mahasiswa->nm_pd,
                'nama_mk' => $key->matakuliah->nama_mk,
                'jumlah_sks' => $key->matakuliah->sks_tatap_muka,
                'nama_dosen' => $key->pengajar->dosen->nama_dosen,
            ]);
        }
        return response()->json([
            'data' => $data,
            'success' => 'data krs mahasiswa pada semester aktif'
        ], 200);
    }
}
