<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KrsMahasiswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function GetKrsMahasiswa()
    {
        $data_krs = "data krs mahasiswa yang bersangkutan";
        return response()->json(['data' => $data_krs, 'success' => 'data krs mahasiswa semester aktif'], 200);
    }
}
