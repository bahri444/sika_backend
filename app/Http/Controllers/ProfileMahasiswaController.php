<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetProfileMahasiswa()
    {
        $data_profile = User::with('mahasiswa')->get();
        // dd($data_profile);
        // $data_profile = "data profile mahasiswa yang bersangkutan";
        return response()->json(['data' => $data_profile, 'success' => 'data profile mahasiswa'], 200);
    }
}
