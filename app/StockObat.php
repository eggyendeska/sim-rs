<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockObat extends Model
{
    public $primarykey = 'id';
    protected $fillable = [
        'kode_obat', 'kode_stock', 'stock_awal', 'stock_sekarang', 'tanggal_kadaluarsa'
    ];
	
	public function Obat(){
		return $this->belongsTo('App\Obat');
	}
}
