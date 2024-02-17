<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mhs';
    public $timestamps = false;

    public function agama()
    {
        return $this->hasOne(Agama::class, 'id_agama', 'id_agama');
    }

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'kode_jurusan');
    }

    public function dosenPa()
    {
        return $this->hasOne(Dosen::class, 'nidn', 'dosen_pa');
    }
}
