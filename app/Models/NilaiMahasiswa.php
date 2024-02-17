<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;
    // use Uuids;

    protected $primaryKey = "id_nilai";
    protected $guarded = [];
}
