<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $table ='detailpenjualan';
    protected $fillable = ['id_penjualan',
                            'id_sepatu',
                            'jumlah_pembelian'
                        ];

    // Relasikan id_penjualan yg ada pada table ini, 
    // dengan table penjualan.. 
    // berdasarkan detailpenjualan.id_penjualan = penjualan.id
    public function penjualan(){
        return $this->belongsTo('App\Penjualan', 'id_penjualan');
    }

    // Relasikan id_sepatu yg ada pada table ini, 
    // dengan table sepatu.. 
    // berdasarkan detailpenjualan.id_sepatu = sepatu.id
    public function sepatu(){
        return $this->belongsTo('App\Sepatu', 'id_sepatu');
    }
}
