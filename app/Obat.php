<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'nama', 'kode', 'jumlah_stock', 'jumlah_awal', 'harga', 'status'
    ];
}
