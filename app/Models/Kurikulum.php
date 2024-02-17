<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use Searchable;
    use HasUuids;
    use HasFactory;
    protected $table = "tbl_kurkulum";
    protected $primaryKey = "id_kurikulum";
    protected $keyType = "String";


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
