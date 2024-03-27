<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetNews()
    {
        $data_berita = Berita::all();
        $berita_limit = Berita::orderBy('berita_id', 'DESC')->limit(1)->get();
        return response()->json([
            'data' => $data_berita,
            'berita_limit' => $berita_limit,
            'success' => 'data profile mahasiswa'
        ], 200);
    }
}
