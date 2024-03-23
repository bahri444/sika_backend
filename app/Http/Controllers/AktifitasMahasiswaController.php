<?php

namespace App\Http\Controllers;

use App\Models\KrsMahasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktifitasMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetAktifitasMahasiswa()
    {
        $data_semester = Mahasiswa::with('krs_mahasiswa', 'krs_mahasiswa.data_semester')->where('nipd', Auth::user()->nim)->get();

        $data_krs = KrsMahasiswa::with('matakuliah')->where('nipd', Auth::user()->nim)->get();
        $aktifitas_semester = $data_krs->sum('matakuliah.sks_tatap_muka');

        $data = [];
        foreach ($data_semester as $val) {
            array_push($data, [
                'nama_semester' => $val->krs_mahasiswa->data_semester->nama_semester,
                'sks' => $aktifitas_semester,
            ]);
        }
        return response()->json(['data' => $data, 'success' => 'data aktifitas mahasiswa'], 200);
    }
}
