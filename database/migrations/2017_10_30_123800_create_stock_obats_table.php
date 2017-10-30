<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_obats', function (Blueprint $table) {
            $table->increments('id');
			$table->string('kode_obat')->references('kode')->on('obats')->onUpdate('cascade')->onDelete('cascade');
			$table->string('kode_stock');
			$table->integer('stock_awal')->unsigned();
			$table->integer('stock_sekarang')->unsigned();
			$table->date('tanggal_kadaluarsa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_obats');
    }
}
