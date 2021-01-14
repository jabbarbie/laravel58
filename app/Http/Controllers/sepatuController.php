<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sepatu;

class sepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datasepatu = Sepatu::all(); 
        return view('sepatu.index', ['sepatu' => $datasepatu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sepatu.create');
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
            'kode_barang'   => 'required|unique:sepatu',
            'nama'  => 'required',
            'harga' => 'required|numeric|min:1000',
            'ukuran'=> 'required|numeric',
            'stok'  => 'required|numeric|min:1'
        ]);

        Sepatu::create($data);
        return redirect()->route('sepatu.create')
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
        $data = Sepatu::find($id);
        return view('sepatu.edit', ['sepatu' => $data]);
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
        $sepatu = Sepatu::find($id);
        $sepatu->kode_barang = $request->kode_barang;
        $sepatu->nama = $request->nama;
        $sepatu->harga = $request->harga;
        $sepatu->stok = $request->stok;
        $sepatu->ukuran = $request->ukuran;

        $sepatu->save();
        return redirect()->route('sepatu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sepatu = Sepatu::find($id);
        $sepatu->delete();
        
        return redirect()->route('sepatu.index');
    }
}
