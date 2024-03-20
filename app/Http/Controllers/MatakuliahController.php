<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetAllMatakuliah()
    {
        $matakuliah =  Matakuliah::select('id_mk', 'nama_mk', 'sks_tatap_muka')->get();
        return response()->json([
            'succeess' => 'data matakuliah',
            'data' => $matakuliah
        ], 200);
    }
}
