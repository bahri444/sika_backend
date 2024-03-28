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
        foreach ($user_login_wellcome as $val) {
            array_push($data, [
                'nama_lengkap' => $val->mahasiswa->nm_pd,
                'nama_semester' => $val->data_semester->nama_semester,
                'semester_aktif' => $val->data_semester->semester_aktif,
                'foto' => $foto_url + Auth::user()->foto,
            ]);
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
