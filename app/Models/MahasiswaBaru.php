<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaBaru extends Model
{
    use HasFactory;
    protected $primaryKey = "id_registrasi";
    protected $table = "mahasiswa_barus";
    protected $fillable = ["nik",    "jenis_bayar",    "tgl_bayar",    "jumlah_bayar",    "potongan"];
}
