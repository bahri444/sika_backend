<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semester';
    protected $primaryKey = 'semester';
    protected $fillable = [
        'nama_semester',
        'semester_aktif'
    ];
    protected $keyType = 'string';
    public $timestamps = false;

    public function data_semester()
    {
        return $this->belongsTo(KrsMahasiswa::class, 'semester', 'semester');
    }
}
