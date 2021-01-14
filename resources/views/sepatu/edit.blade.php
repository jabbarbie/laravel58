@extends('layouts.master')
@section('title', 'Ubah Data Sepatu')

@section('content')

<div class="box box-info">
<div class="box-header with-border">
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



<form action="{{ route('sepatu.update', $sepatu->id) }}" class="form-horizontal" method="POST" >
    @csrf
    @method('PUT')
    <div class="box-body">

    <div class="form-group ">
        
        <label for="nama" class="col-sm-2 control-label">Kode Barang</label>

        <div class="col-sm-3">
        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="{{ $sepatu->kode_barang }}" autofocus required>


        </div>
        
    </div>

    <div class="form-group ">
        
        <label for="nama" class="col-sm-2 control-label">Nama Barang</label>

        <div class="col-sm-5">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" value="{{ $sepatu->nama }}">


        </div>
        
    </div>

    <div class="form-group">
        <label for="harga" class="col-sm-2 control-label">Harga</label>

        <div class="col-sm-3">
        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="{{ $sepatu->harga }}">
        </div>
    </div>
    <div class="form-group">
        <label for="stok" class="col-sm-2 control-label">Stok</label>

        <div class="col-sm-1">
        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{ $sepatu->stok }}">
        </div>
    </div>

    <div class="form-group">
        <label for="ukuran" class="col-sm-2 control-label">Ukuran</label>

        <div class="col-sm-2">
        <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran" value="{{ $sepatu->ukuran }}">
        </div>
    </div>
    

    
    
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    <div class="col-sm-2"></div>
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