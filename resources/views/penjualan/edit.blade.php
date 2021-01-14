@extends('layouts.master')
@section('title', 'Ubah Transaksi Penjualan')

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
<form action="{{ route('penjualan.update', $penjualan->id) }}" class="form-horizontal" method="POST" id="transaksipenjualan">
    @csrf
    @method('PUT')

    <div class="box-body">

    <div class="row">
        <div class="col-md-6">

            <!-- Tanggal -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Tanggal Penjualan</label>
                <div class="col-sm-8">
                    <input type="text" value="{{ $penjualan->tanggal_transaksi }}" class="form-control datepicker" id="tanggal_transaksi" name="tanggal_transaksi"  required="required">
                </div>    
            </div>

            <!-- Nama Pelanggan -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Nama Pelanggan</label>
                <div class="col-sm-8">
                    <input type="text" disabled value="{{ $penjualan->pelanggan->nama }}" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" autofocus required="required">
                </div>    
            </div>

            <!-- Alamat Pelanggan -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8">
                    <textarea name="alamat" disabled id="alamat" cols="50" rows="5" class="form-control">{{ $penjualan->pelanggan->alamat ?? ''}}</textarea>
                </div>    
            </div>


            <!-- Sepatu -->
            <div class="form-group ">        
                <label for="nama" class="col-sm-4 control-label">Metode Pembayaran</label>
                <div class="col-sm-4">
                    <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control">
                        <option value="Tunai" {{ ($penjualan->jenis_pembayaran == 'Tunai')?'selected':'' }}>Tunai</option>
                        <option value="Kredit" {{ ($penjualan->jenis_pembayaran == 'Kredit')?'selected':'' }} >Kredit</option>
                    </select>
                </div>    
            </div>

        </div>
    </div> 

    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    <div class="col-sm-4"></div>
    <div class="col-sm-9 pl-0" style="padding-left: 5px">
        <button type="submit" class="btn btn-info mr-2" style="margin-right: 5px">Simpan</button>

    </div>

    </div>
    <!-- /.box-footer -->
</form>
</div>

<!-- </div>
</div> -->
@endsection