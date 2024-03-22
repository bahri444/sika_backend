<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsMahasiswa extends Model
{
    use HasFactory;
    // use Uuids;

    protected $primaryKey = 'id_krs_mhs';
    protected $table = 'krs_mhs';
    protected $fillable = [
        "semester",
        "nipd",
        "kode_prodi",
        "kode_mk",
        "id_kelas",
        "status"
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'nipd', 'nipd');
    }

    public function nilai()
    {
        return $this->hasOne(NilaiMahasiswa::class, 'nipd', 'nipd');
    }

    public function matakuliah()
    {
        return $this->hasOne(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    public function kelas()
    {
        return $this->hasOne(KelasKuliah::class, 'id_kelas', 'id_kelas');
    }

    public function pengajar()
    {
        return $this->hasOne(DosenPengajar::class, 'id_kelaskuliah', 'id_kelas');
    }

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }

    public function data_semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'semester');
    }
}
