<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetNilaiMahasiswa()
    {
        $getNilai = "SELECT * FROM `nilai_mahasiswas` WHERE  id_kelas = 'dbc3beae-3edb-4510-a4bd-21162cea8227' AND nipd = 'TI16190004'  AND semester = '20231'";
        return response()->json([
            'status' => 'success',
            'data' => $getNilai
        ], 200);
    }
}
