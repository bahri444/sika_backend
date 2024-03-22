<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetDataSemester()
    {
        $data = Mahasiswa::with('krs_mahasiswa', 'krs_mahasiswa.data_semester')->where('nipd', Auth::user()->nim)->get();
        $data_krs = [];
        foreach ($data as $val) {
            array_push($data_krs, [
                'semester' => $val->krs_mahasiswa->semester,
                'nama_semester' => $val->krs_mahasiswa->data_semester->nama_semester,
                'semester_aktif' => $val->krs_mahasiswa->data_semester->semester_aktif,
            ]);
        }
        return response()->json([
            'success' => 'all data semester',
            'data' => $data_krs
        ], 200);
    }
}
