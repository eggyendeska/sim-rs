<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
	public $primarykey = 'id';
	protected $table = 'obats';
    protected $fillable = [
        'nama', 'kode', 'harga', 'status' ,'satuan'
    ];
	
	public function Stocks(){
		return $this->hasMany('App\StockObat','kode_obat');
	}
}
