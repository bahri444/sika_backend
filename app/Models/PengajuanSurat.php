<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $primaryKey = "surat_id";
    protected $table = "pengajuan_surat";
    protected $fillable = ["nim",    "jenis_surat"];
}
