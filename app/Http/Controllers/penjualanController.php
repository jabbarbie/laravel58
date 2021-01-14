<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;

class penjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenjualan = Penjualan::with(['pelanggan'])->orderBy('id', 'DESC')->get(); 
        return view('penjualan.index', ['penjualan' => $datapenjualan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.create');
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
            'nama'  => 'required',
            'alamat'  => 'required',
            'jenis_pembayaran' => 'required'
        ]);
        $pelanggan   = \App\Pelanggan::create($data);
        

        // Ubah Format Tanggal ke Unix
        // Agar dapat dibaca oleh system 
        $tgl    = strtotime($request->tanggal_transaksi);
        $tgl    = \Carbon\Carbon::createFromTimestamp($tgl)->toDateTimeString(); 

        $datapenjualan  = [
            'id_pelanggan'  => $pelanggan->id,
            'tanggal_transaksi' => ($request->tanggal_transaksi)?$tgl:\Carbon\Carbon::today(),
            'jenis_pembayaran'  => $data['jenis_pembayaran']
        ];        
        $penjualan = Penjualan::create($datapenjualan);

        return redirect()->route('detail.edit', $penjualan->id)
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
        $data = Penjualan::find($id);
        return view('penjualan.index', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan  = Penjualan::find($id);
        if ($penjualan)
            $penjualan->delete();

        // Hapus juga untuk table detail
        $detail     = \App\Detail::where('id_penjualan', $id);
        if ($detail)
            $penjualan->delete();
        
        return redirect()->route('penjualan.index');
    }
}
