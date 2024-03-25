<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajuanSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function PengajuanSurat(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nim' => 'required',
                'jenis_surat' => 'required',
            ]
        );
        try {
            PengajuanSurat::create($request->all());
            return response()->json(['success' => 'pengajuan surat berhasil'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'pengajuan surat gagal' . $e], 500);
        }
    }
}
