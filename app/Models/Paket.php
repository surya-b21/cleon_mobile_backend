<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'id_jenis',
        'nama',
        'harga',
        'speed',
        'aktif',
        'keterangan'
    ];

    public function jenispaket()
    {
        return $this->belongsTo(JenisPaket::class, 'id_jenis');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'id_jenis');
    }
}
