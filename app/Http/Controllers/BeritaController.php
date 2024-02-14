<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetNews()
    {
        $data_news = "berita terbaru STMIK Lombok";
        return response()->json([
            'data' => $data_news
        ], 200);
    }
}
