<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiKrs extends Model
{
    use HasFactory;
    protected $primaryKey = "id_konsultasi";
    protected $table = "tbl_konsultasi_krs";
    protected $fillable = [
        "id_konsultasi",
        "pesan_konsultasi",
        "nipd",
        "semester"
    ];
}
