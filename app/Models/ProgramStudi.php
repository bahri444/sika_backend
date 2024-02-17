<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    // use Uuids;

    protected $table = "program_studi";
    protected $primaryKey = "id_prodi";


    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }
}
