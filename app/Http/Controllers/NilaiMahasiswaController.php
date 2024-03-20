<?php

namespace App\Http\Controllers;

use App\Models\NilaiMahasiswa;
use Illuminate\Support\Facades\Auth;

class NilaiMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetNilaiMahasiswa($semester)
    {
        $getNilai = NilaiMahasiswa::with('kelas_kuliah', 'kelas_kuliah.matakuliah', 'kelas_kuliah.data_semester', 'kelas_kuliah.dosen_ajar', 'kelas_kuliah.dosen', 'kelas_kuliah.mk_kurikulum', 'kelas_kuliah.peserta')
            ->where('semester', $semester)
            ->where('nipd', Auth::user()->nim)
            ->get();

        $data = [];
        foreach ($getNilai as $val) {
            array_push($data, [
                'semester' => $val->kelas_kuliah->data_semester->semester,
                'nama_mk' => $val->kelas_kuliah->matakuliah->nama_mk,
                'nilai_angka' => $val->nilai_angka,
                'nilai_index' => $val->nilai_index,
                'nilai_huruf' => $val->nilai_huruf,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }
}
