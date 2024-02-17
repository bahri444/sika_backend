<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // use Uuids;

    protected $primaryKey = 'id_pembayaran';

    public function mahasiswa()
    {
        return $this->hasOne(tbl_mahasiswa::class, 'nipd', 'nim');
    }
}
