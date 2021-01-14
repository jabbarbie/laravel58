<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table ='penjualan';
    protected $fillable = ['id_pelanggan',
                            'tanggal_transaksi',
                            'jenis_pembayaran',
                            'total_pembayaran'];
    
    // Relasikan id_pelanggan yg ada pada table ini, 
    // dengan table pelanggan.. 
    // berdasarkan penjualan.id_pelanggan = pelanggan.id
    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }


}
