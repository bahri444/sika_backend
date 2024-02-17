<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranskripNilaiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function GetTranskripNilai()
    {
        $data_transkrip_nilai = "data trasnkrip nilai mahasiswa yang bersangkutan";
        return response()->json(['data' => $data_transkrip_nilai, 'success' => 'data trasnkrip nilai mahasiswa'], 200);
    }
}
