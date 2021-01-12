<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpenjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('id_penjualan')->unsigned();
            $table->biginteger('id_sepatu')->unsigned();
            $table->integer('jumlah_pembelian');
            $table->timestamps();


            // Relasi one - one dengan table penjualan
            $table->foreign('id_penjualan')
                    ->references('id')->on('penjualan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            // Relasi one - one dengan table sepatu
            $table->foreign('id_sepatu')
                    ->references('id')->on('sepatu')
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
        Schema::dropIfExists('detailpenjualan');
    }
}
