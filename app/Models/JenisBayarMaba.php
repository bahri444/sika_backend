<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBayarMaba extends Model
{
    use HasFactory;
    protected $primaryKey = "id_jenis_bayar";
    protected $table = "jenis_bayar_mabas";
    protected $fillable = ["jenis_bayar"];
}
