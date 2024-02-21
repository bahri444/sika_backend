<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_waktu';
    protected $table = 'waktus';
    protected $fillable = [
        'nama_waktu',
        'tgl_mulai',
        'tgl_selesai',
        'status'
    ];
}
