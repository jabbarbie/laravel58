<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    //
    protected $table ='sepatu';
    protected $fillable = ['kode_barang','nama','harga','stok','ukuran'];

}

