<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = "mata_kuliah";
    protected $primaryKey = "id_mk";
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'jenis_mk',
        'sks_tatap_muka',
        'sks_praktek',
        'sks_praktek_lapangan',
        'sks_simulasi',
        'metode_pembelajaran',
        'tgl_mulai_efektif',
        'tgl_akhir_efektif',
        'kode_prodi',
        'id_matkul'
    ];
    public $timestamps = false;

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }
}
