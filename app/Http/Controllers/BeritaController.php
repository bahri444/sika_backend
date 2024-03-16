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
        $data_news = Berita::orderBy('berita_id', 'DESC')->limit(2)->get();
        return response()->json([
            'data' => $data_news
        ], 200);
    }
}
