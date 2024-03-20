<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function GetDataSemester()
    {
        $data = Semester::all();
        return response()->json([
            'success' => 'all data semester',
            'data' => $data
        ], 200);
    }
}
