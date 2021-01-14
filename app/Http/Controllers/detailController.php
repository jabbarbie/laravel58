<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Detail;
use App\Sepatu;
use App\Pelanggan;
use App\Penjualan;
use Carbon\Carbon;

class detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenjualan = Penjualan::with(['pelanggan'])->orderBy('id', 'DESC')->get(); 
        return view('detail.index', ['penjualan' => $datapenjualan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data   = $request->validate([
            'kode_barang'  => 'required',
            'jumlah_pembelian' => 'required|numeric|min:1',
            'id_penjualan'   => 'required|numeric'
        ]);

        // Cari id_sepatu berdasarkan kode_barang
        $kode_barang = $request->kode_barang;
        $sepatu     = Sepatu::where('id', $kode_barang)->first();
        $id_sepatu  = $sepatu->id;

        $data['id_sepatu']  = $id_sepatu;

        Detail::create($data);

        // Update Total Pembayaran (Penjualan)
        $penjualan  = Penjualan::find($data['id_penjualan']);
        $penjualan->total_pembayaran = $penjualan->total_pembayaran + ($sepatu->harga * $data['jumlah_pembelian']);
        $penjualan->save();

        // Kurangi Stok Sepatu berdasarkan jumlah_pembelian
        $sepatu->stok   = $sepatu->stok - $data['jumlah_pembelian'];
        $sepatu->save();

        return redirect()->route('detail.edit', $data['id_penjualan'])
            ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualan  = Penjualan::find($id);
        $pelanggan  = Pelanggan::find($penjualan->id_pelanggan);
        $sepatu     = Sepatu::all();
        // Dapatkan detail penjualan - untuk table detail
        $detail     = Detail::where('id_penjualan', $id)->get();

        $penjualan->tanggal_transaksi = Carbon::create($penjualan->tanggal_transaksi)->isoFormat('dddd, D MMM YYYY');
        return vieW('detail.create', ['sepatu' => $sepatu,'pelanggan' => $pelanggan, 'penjualan' => $penjualan, 'detail' => $detail]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail     = Detail::find($id);
        $penjualan  = Penjualan::where('id_penjualan', $detail->id_penjualan);
        $pelanggan  = Pelanggan::where('id_penjualan', $penjualan->id_pelanggan);

        
        // Hapus juga untuk table detail
        $detail     = Detail::where('id_penjualan', $id);
        
        if ($penjualan) $penjualan->delete();
        if ($detail) $detail->delete();
        if ($pelanggan) $pelanggan->delete();
        
        return redirect()->route('detail.index');
    }
}
