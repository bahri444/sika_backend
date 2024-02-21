<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DosenPengajar extends Model
{
    use HasFactory;
    use HasUuids;
    // use Uuids;

    protected $primaryKey = 'id';
    protected $table = 'dosen_pengajars';
    protected $fillable = [
        "id_kelaskuliah",
        "nidn",
        "rencana_tatap_muka",
        "tatap_muka_real",
        "jenis_evaluasi"
    ];

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'nidn', 'nidn');
    }
    public function kelas()
    {
        return $this->hasOne(KelasKuliah::class,  'id_kelas', 'id_kelaskuliah');
    }
    public function peserta()
    {
        return $this->hasMany(KrsMahasiswa::class, 'id_kelas', 'id_kelaskuliah');
    }
}
