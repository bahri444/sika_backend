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
    public function GetKrsMahasiswa($semester)
    {
        $data_krs = KrsMahasiswa::with('mahasiswa', 'nilai', 'matakuliah', 'kelas', 'pengajar.dosen', 'prodi')
            ->where('semester', $semester)
            ->where('nipd', Auth::user()->nim)->get();
        $data = [];
        foreach ($data_krs as $val) {
            array_push($data, [
                'semester' => $val->semester,
                'nipd' => $val->mahasiswa->nipd,
                'nama_mahasiswa' => $val->mahasiswa->nm_pd,
                'nama_mk' => $val->matakuliah->nama_mk,
                'jumlah_sks' => $val->matakuliah->sks_tatap_muka,
                'nama_dosen' => $val->pengajar->dosen->nama_dosen,
            ]);
        }
        return response()->json([
            'data' => $data,
            'success' => 'data krs mahasiswa pada semester aktif'
        ], 200);
    }
}
