<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

class ProfileMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetProfileMahasiswa()
    {
        $data_profile = User::with('mahasiswa')->where("nim", Auth::user()->nim)->get();
        $data = [];
        $foto_url = 'https://sika-v2.stmiklombok.ac.id/assets/images/profile/';
        foreach ($data_profile as $val) {
            $foto_name = $val->foto;
            $file_profile = $foto_url . $foto_name;
            if (@fopen($file_profile, '404')) {
                array_push($data, [
                    'nim' => $val->nim,
                    'nama_lengkap' => $val->nama_lengkap,
                    'foto' => $file_profile,
                    'alamat' => [$val->rt, $val->rw, $val->nm_dsn, $val->ds_kel]
                ]);
            } else {
                array_push($data, [
                    'nim' => $val->nim,
                    'nama_lengkap' => $val->nama_lengkap,
                    'foto' => $foto_url . $val->foto,
                    'alamat' => [$val->rt, $val->rw, $val->nm_dsn, $val->ds_kel]
                ]);
            }
        }
        return response()->json(['data' => $data, 'success' => 'data profile mahasiswa'], 200);
    }
}
