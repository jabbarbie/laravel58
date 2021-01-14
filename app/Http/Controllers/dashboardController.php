<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $sepatu     = \App\Sepatu::all()->count();
        $pelanggan  = \App\Pelanggan::all()->count();
        $penjualan  = \App\Penjualan::all()->count();
        $user       = \App\User::all()->count();

        $jumlah   = [
            'sepatu'    => $sepatu,
            'pelanggan' => $pelanggan,
            'penjualan' => $penjualan,
            'user'      => $user
        ];
        return view('dashboard.index', ['jumlah' => $jumlah]);
    }
}
