<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = [
        "id_dosen",
        "nama_dosen",
        "nidn",
        "nip",
        "id_agama",
        "tanggal_lahir",
        "id_status_aktif",
        "kode_jurusan",
        "alamat",
        "jk",
        "hp",
        "email",
        "id_registrasi_dosen"
    ];
    public $timestamps = false;


    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'kode_jurusan');
    }
}
