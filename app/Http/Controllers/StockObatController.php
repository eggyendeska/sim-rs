<?php

namespace App\Http\Controllers;

use App\StockObat;
use App\Obat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStock;
use Illuminate\Contracts\Encryption\DecryptException;
use \Crypt;

class StockObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kode)
    {
        $stocks = StockObat::where('kode_obat',$kode)->get();
		$obat = Obat::where('kode',$kode)->first();
		return view('obat/stock')
					->with('title','Data Stock Obat "'.$obat->nama.'"')
					->with('stocks',$stocks)
					->with('kode',$kode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kode)
    {
        return view('obat/stock_create')
					->with('title','Tambah Stock Obat "'.$kode.'"')
					->with('kode',$kode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($kode, StoreStock $request)
    {
        $kode_stock = md5(uniqid(rand(), true));
        $kode_stock = strtoupper(substr($kode_stock,0,5));
		
		StockObat::create([
            'kode_obat' => $kode,
            'kode_stock' => $kode."_".$kode_stock,
            'stock_awal' => $request['jumlah_awal'],
            'stock_sekarang' => $request['jumlah_awal'],
            'tanggal_kadaluarsa' => $request['tanggal_kadaluarsa'],
        ]);
		
		return redirect('/obat/'.$kode.'/stock')->with('alert-success','Tambah stock obat '.$kode.' berhasil!'); 
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockObat  $stockObat
     * @return \Illuminate\Http\Response
     */
    public function show(StockObat $stockObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockObat  $stockObat
     * @return \Illuminate\Http\Response
     */
    public function edit($kode, $id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$obat = Obat::where('kode',$kode)->first();
		
		$stock = StockObat::find($id);
		return view('obat/stock_edit')
					->with('title','Edit Data Obat '.$obat->nama)
					->with('stock',$stock)
					->with('kode',$kode);
	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockObat  $stockObat
     * @return \Illuminate\Http\Response
     */
    public function update($kode, $id, StoreStock $request)
    {
        $stock = StockObat::find($id);
		if(empty($stock)){
			return back()->with('alert-danger',
								'Terjadi kesalahan, ID stock obat tidak ditemukan!');
		}
        StockObat::where('id',$id)
				->update([
					'stock_awal' => $request['jumlah_awal'],
					'stock_sekarang' => $request['jumlah_sekarang'],
					'tanggal_kadaluarsa' => $request['tanggal_kadaluarsa'],
				]);
				
		return redirect('obat/'.$kode.'/stock')->with('alert-success',
													'Data stock obat telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockObat  $stockObat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		$obats = StockObat::find($id);
		$obats->delete();
		return 1;
    }
}
