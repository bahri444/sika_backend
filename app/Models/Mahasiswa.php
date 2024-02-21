<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mhs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nm_pd',
        'jk',
        'nisn',
        'npwp',
        'nik',
        'tmpt_lahir',
        'tgl_lahir',
        'id_agama',
        'id_kk',
        'jln',
        'rt',
        'rw',
        'nm_dsn',
        'ds_kel',
        'id_wil',
        'kode_pos',
        'id_jns_tinggal',
        'id_alat_transport',
        'no_tel_rmh',
        'no_hp',
        'email',
        'a_terima_kps',
        'no_kps',
        'stat_pd',
        'nik_ayah',
        'nm_ayah',
        'tgl_lahir_ayah',
        'id_jenjang_pendidikan_ayah',
        'id_kebutuhan_khusus_ayah',
        'id_kebutuhan_khusus_ibu',
        'id_pekerjaan_ayah',
        'id_penghasilan_ayah',
        'nik_ibu',
        'nm_ibu_kandung',
        'tgl_lahir_ibu',
        'id_jenjang_pendidikan_ibu',
        'id_penghasilan_ibu',
        'id_pekerjaan_ibu',
        'nm_wali',
        'tgl_lahir_wali',
        'id_jenjang_pendidikan_wali',
        'id_pekerjaan_wali',
        'id_penghasilan_wali',
        'kewarganegaraan',
        'kode_jurusan',
        'id_jns_daftar',
        'nipd',
        'tgl_masuk_sp',
        'mulai_smt',
        'id_jalur_masuk',
        'dosen_pa',
        'password',
        'kelas',
        'id_mahasiswa'
    ];
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
