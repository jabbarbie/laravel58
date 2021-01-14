@extends('layouts.master')
@section('title', 'Detail Transaksi Penjualan')

@section('content')
<!-- <div class="row">
    <div class="col-md-8"> -->


<div class="box box-info">
<div class="box-header with-border">
    <!-- <h3 class="box-title">penjualan</h3> -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Gagal </strong> Menyimpan data:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<!-- /.box-header -->
<!-- form start -->


<!-- {{ route('penjualan.store') }} -->
<form action="{{ route('detail.store', $penjualan->id ) }}" class="form-horizontal" method="POST" id="transaksipenjualan">
    @csrf
    <input type="hidden" name="id_penjualan" value="{{ $penjualan->id }}">
    <div class="box-body">

    <div class="row">
        <div class="col-md-6">

            <!-- Nama Pelanggan -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Nama Pelanggan</label>
                <div class="col-sm-8">
                    <input type="text" value="{{ $pelanggan->nama }}" class="form-control " disabled id="nama" name="nama" placeholder="Nama penjualan" autofocus required="required">
                </div>    
            </div>

            <!-- Alamat Pelanggan -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8">
                    <textarea name="alamat" id="alamat" disabled cols="50" rows="5" class="form-control">{{ $pelanggan->alamat }}</textarea>
                </div>    
            </div>
        
        </div>

        <div class="col-md-6">
            
            <!-- Nama Pelanggan -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Tanggal Transaksi</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $penjualan->tanggal_transaksi }}" class="form-control " disabled id="tanggal_transaksi" name="tanggal_transaksi" placeholder="Tanggal Transaksi" autofocus required="required">
                </div>    
            </div>

        </div>
    </div> 

    <br>
    <div class="row">
    <div class="col-md-6">

        <!-- Kode Barang -->
        <div class="form-group ">        
            <label for="kodebarang" class="col-sm-4 control-label">Kode Barang</label>
            <div class="col-sm-5 ">
                <select id="kodebarang" name="kode_barang" class="form-control iniselect2" style="width: 100%">
                    <option value="">Pilih Sepatu</option>
                    @foreach ($sepatu as $sp)
                        <option value="{{ $sp->id }}" 
                            data-nama="{{ $sp->nama }}"
                            data-harga="{{ $sp->harga }}"
                            >

                            {{ $sp->kode_barang.' '.$sp->nama }}
                        
                        </option>
                    @endforeach
                </select>
            </div>    
        </div>

        <!-- Sepatu -->
        <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label">Nama Barang</label>
            <div class="col-sm-8">
                <input type="text" disabled class="form-control disable" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autofocus required="required">
            </div>    
        </div>

        <!-- Harga Barang -->
        <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label">Harga</label>
            <div class="col-sm-6">
                <input type="number" disabled class="form-control" placeholder="Harga Barang" id="harga" name="harga" required="required">
            </div>    
        </div>

        <!-- Qty -->
        <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label">Qty</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" value="1" min="1" id="jumlah_pembelian" name="jumlah_pembelian" required="required">
            </div>    
        </div>

        <!-- Btn Tambah -->
        <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label"></label>
            <div class="col-sm-2">
                <button  id="btntambah" type="submit" class="btn btn-primary disabled">Tambah</button>
            </div>    
        </div>

    </div>

    <!-- Kolom Kanan -->
    <div class="col-md-6">

        <!-- Jumlah beli -->
        <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label">Total Bayar</label>
            <div class="col-sm-5">
                <input type="text" value="{{ number_format($penjualan->total_pembayaran) }}" class="form-control" value="0" disabled id="total_pembayaran" name="total_pembayaran" required="required">
            </div>    
        </div>
         <!-- Sepatu -->
         <div class="form-group ">        
            <label for="nama" class="col-sm-4 control-label">Metode Pembayaran</label>
            <div class="col-sm-4">
                <select name="jenis_pembayaran" disabled id="jenis_pembayaran" class="form-control ">
                    <option value="Tunai">Tunai</option>
                    <option value="Kredit">Kredit</option>
                </select>
            </div>    
        </div>
       

    </div>
    </div>
</form>

<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-strip" id="tableDetail">
                <thead>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                </thead>
                <tbody>
                    @foreach($detail as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->sepatu->kode_barang }}</td>
                            <td>{{ $r->sepatu->nama }}</td>
                            <td>{{ number_format($r->sepatu->harga) }}</td>
                            <td>{{ $r->jumlah_pembelian }}</td>
                            <td>{{ number_format($r->sepatu->harga*$r->jumlah_pembelian) }}</td>
                           

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">


    </div>
    <!-- /.box-footer -->
</div>

<!-- </div>
</div> -->
@endsection