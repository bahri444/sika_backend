<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // use Uuids;

    protected $primaryKey = 'id_pembayaran';
    protected $table = 'tbl_pembayarans';
    protected $fillable = [
        'nim',
        'jumlah_bayar',
        'tgl_bayar',
        'no_resi',
        'semester',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'nipd', 'nim');
    }
}
