<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('id_pelanggan')->unsigned();
            $table->date('tanggal_transaksi');
            $table->string('jenis_pembayaran')->nullable();
            $table->integer('total_pembayaran')->nullable();
            $table->timestamps();


            // Buat relasi penjualan dengan pelanggan 
            // berdasarkan id_pelanggan
            $table->foreign('id_pelanggan')
                    ->references('id')->on('pelanggan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
