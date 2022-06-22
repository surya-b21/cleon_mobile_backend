<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat';

    protected $fillable = [
        'id_user',
        'id_paket',
        'username',
        'password'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];
}
