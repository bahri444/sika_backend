<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KrsMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function Index()
    {


        $user_login_wellcome = KrsMahasiswa::with('mahasiswa', 'data_semester')
            ->orderBy('nipd', 'DESC')
            ->where('nipd', Auth::user()->nim)
            ->limit(1)
            ->get();
        $data = [];
        $foto_url = 'https://sika-v2.stmiklombok.ac.id/assets/images/profile/';
        $nama_foto = Auth::user()->foto;

        $foto_name = "profile-default.png";
        $foto_user = $foto_url . $nama_foto;
        foreach ($user_login_wellcome as $val) {
            if (@fopen($foto_user, 'r')) {
                // di eksekusi jika nama foto yang ada pada database ada pada direktori projek
                array_push($data, [
                    'nama_lengkap' => $val->mahasiswa->nm_pd,
                    'nama_semester' => $val->data_semester->nama_semester,
                    'semester_aktif' => $val->data_semester->semester_aktif,
                    'foto' => $foto_user
                ]);
            } else {
                // di eksekusi jika nama foto yang ada pada database tidak ada pada direktori projek
                array_push($data, [
                    'nama_lengkap' => $val->mahasiswa->nm_pd,
                    'nama_semester' => $val->data_semester->nama_semester,
                    'semester_aktif' => $val->data_semester->semester_aktif,
                    'foto' => $foto_url . $foto_name
                ]);
            }


            // array_push($data, [
            //     'nim' => $val->nim,
            //     'nama_lengkap' => $val->mahasiswa->nm_pd,
            //     'foto' => $file_profile,
            //     'alamat' => $val->mahasiswa->nm_dsn,
            //     'email' => $val->mahasiswa->email,
            //     'telepon' => $val->mahasiswa->no_hp,
            //     'nama_ibu' => $val->mahasiswa->nm_ibu_kandung,
            //     'nama_ayah' => $val->mahasiswa->nm_ayah
            // ]);

            // array_push($data, [
            //     'nim' => $val->nim,
            //     'nama_lengkap' => $val->mahasiswa->nm_pd,
            //     'foto' => $foto_url . $val->foto,
            //     'alamat' => $val->mahasiswa->nm_dsn,
            //     'email' => $val->mahasiswa->email,
            //     'telepon' => $val->mahasiswa->no_hp,
            //     'nama_ibu' => $val->mahasiswa->nm_ibu_kandung,
            //     'nama_ayah' => $val->mahasiswa->nm_ayah
            // ]);
        }


        return response()->json([
            'data' => $data,
            'success' => 'data krs mahasiswa pada semester aktif'
        ], 200);
    }

    public function GetNewsLimit()
    {
        $berita_limit = Berita::orderBy('berita_id', 'DESC')->limit(1)->get();
        return response()->json([
            'data' => $berita_limit,
            'success' => 'data profile mahasiswa'
        ], 200);
    }

    public function GetNews()
    {
        $data_berita = Berita::orderBy('berita_id', 'DESC')->get();
        return response()->json([
            'data' => $data_berita,
            'success' => 'data profile mahasiswa'
        ], 200);
    }
}
