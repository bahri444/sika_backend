<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkKurikulum extends Model
{
    use HasFactory;
    protected $table = "tbl_mk_kurikulum";
    protected $primaryKey = "id_mk_kur";
    protected $fillable = [
        'id_kurikulum',
        'kode_prodi',
        'kode_mk',
    ];
    public $timestamps = false;

    public function matakuliah()
    {
        return $this->hasOne(MkKurikulum::class, 'kode_mk', 'kode_mk');
    }

    public function kurikulum()
    {
        return $this->hasOne(Kurikulum::class, 'id_kurikulum', 'id_kurikulum');
    }
}
