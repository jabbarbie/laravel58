@extends('layouts.master')
@section('title', 'Ubah Data Sepatu')

@section('content')
<!-- <div class="row">
    <div class="col-md-8"> -->


<div class="box box-info">
<div class="box-header with-border">
    <!-- <h3 class="box-title">Sepatu</h3> -->
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



<form action="{{ route('sepatu.store') }}" class="form-horizontal" method="POST" >
    @csrf
    <div class="box-body">

    <div class="form-group ">
        
        <label for="nama" class="col-sm-2 control-label">Nama Barang</label>

        <div class="col-sm-5">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">


        </div>
        
    </div>

    <div class="form-group">
        <label for="harga" class="col-sm-2 control-label">Harga</label>

        <div class="col-sm-3">
        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
        </div>
    </div>
    <div class="form-group">
        <label for="stok" class="col-sm-2 control-label">Stok</label>

        <div class="col-sm-1">
        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
        </div>
    </div>

    <div class="form-group">
        <label for="ukuran" class="col-sm-2 control-label">Ukuran</label>

        <div class="col-sm-2">
        <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Ukuran">
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