<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranskripNilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetTranskripNilai()
    {
        $data_semester = Mahasiswa::with('krs_mahasiswa', 'krs_mahasiswa.data_semester')->where('nipd', Auth::user()->nim)->get();

        $count_data_nilai = NilaiMahasiswa::where('nipd', Auth::user()->nim)->get();

        $ipk = $count_data_nilai->sum('nilai_index') / $count_data_nilai->count();

        $data = [];
        foreach ($data_semester as $val) {
            array_push($data, [
                'nama_semester' => $val->krs_mahasiswa->data_semester->nama_semester,
                'ipk_semester' => $ipk,
            ]);
        }
        return response()->json(['data' => $data, 'success' => 'data trasnkrip nilai mahasiswa'], 200);
    }
}
