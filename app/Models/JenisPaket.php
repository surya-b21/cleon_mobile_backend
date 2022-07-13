<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPaket extends Model
{
    use HasFactory;

    protected $table = 'jenis_paket';

    protected $fillable = [
        'nama'
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class, 'id_jenis');
    }
}
