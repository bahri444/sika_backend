<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    // use Searchable;
    use HasUuids;
    use HasFactory;
    protected $table = "tbl_kurkulum";
    protected $primaryKey = "id_kurikulum";
    protected $keyType = "String";
    protected $fillable = [
        "nama_kurikulum",
        "id_prodi",
        "id_semester",
        "jumlah_sks_lulus",
        "jumlah_sks_wajib",
        "jumlah_sks_pilihan",
        "status"
    ];


    public function toSearchableArray(): array
    {
        return [
            'nama_kurikulum' => $this->name,
        ];
    }
    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'id_prodi');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'semester', 'id_semester');
    }

    public function mk_kurikulum()
    {
        return $this->hasMany(MkKurikulum::class, 'id_kurikulum', 'id_kurikulum');
    }
}
