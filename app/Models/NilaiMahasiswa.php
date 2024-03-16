<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;
    // use Uuids;

    protected $primaryKey = "id_nilai";
    protected $table = 'nilai_mahasiswas';
    protected $fillable = [
        'id_kelas',
        'nipd',
        'semester',
        'nilai_kehadiran',
        'nilai_keaktifan',
        'nilai_tugas',
        'nilai_quiz',
        'nilai_uts',
        'nilai_uas',
        'nilai_huruf',
        'nilai_index',
        'nilai_angka'
    ];
    protected $guarded = [];
    public function kelas_kuliah()
    {
        return $this->hasOne(KelasKuliah::class, 'id_kelas', 'id_kelas');
    }
}
