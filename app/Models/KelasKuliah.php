<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\Uuids;

class KelasKuliah extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = "id_kelas";
    protected $table = "tbl_kelas_kuliahs";
    protected $fillable = [
        "id_kelas",
        "semester",
        "kode_mk",
        "nama_kelas",
        "ruang",
        "hari",
        "jam_mulai",
        "jam_selesai",
        "tgl_mulai",
        "tgl_selesai",
        "bahasan",
        "kelas_kampus_merdeka",
        "kode_prodi",
        "nidn",
    ];

    /**
     * Get the user associated with the tbl_kelas_kuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function matakuliah()
    {
        return $this->hasOne(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    public function data_semester()
    {
        return $this->hasOne(Semester::class, 'semester', 'semester');
    }

    public function dosen_ajar()
    {
        return $this->hasOne(DosenPengajar::class, 'id_kelaskuliah', 'id_kelas');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'nidn', 'nidn');
    }

    public function mk_kurikulum()
    {
        return $this->hasOne(MkKurikulum::class, 'kode_mk', 'kode_mk');
    }

    public function peserta()
    {
        return $this->hasMany(KrsMahasiswa::class, 'id_kelas', 'id_kelas');
    }
}
