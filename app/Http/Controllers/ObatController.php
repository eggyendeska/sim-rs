<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreObat;
use Illuminate\Contracts\Encryption\DecryptException;
use \Crypt;

class ObatController extends Controller
{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');			
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::all();
		return view('obat/index')
					->with('title','Data Obat')
					->with('obats',$obats);
				
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat/create')
				->with('title','Tambah Data Obat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObat $request)
    {
        Obat::create([
            'nama' => $request['nama'],
            'kode' => $request['kode'],
            'jumlah_awal' => $request['jumlah'],
            'jumlah_stock' => $request['jumlah'],
            'harga' => $request['harga'],
            'status' => $request['status'],
        ]);
		
		return redirect('/obat')->with('alert-success','Tambah obat berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return "error";
		}
		$obats = Obat::find($id);
		if($obats->delete()){
			echo 1;
		}else{
			echo 0;
		}
    }
}
