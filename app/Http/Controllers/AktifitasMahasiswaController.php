<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AktifitasMahasiswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    public function GetAktifitasMahasiswa()
    {
        $data_aktifitas = "data mahasiswa yang bersangkutan";
        return response()->json(['data' => $data_aktifitas, 'success' => 'data aktifitas mahasiswa'], 200);
    }
}
