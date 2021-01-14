@extends('layouts.master')
@section('title', 'Ubah Data Pelanggan')

@section('content')
<!-- <div class="row">
    <div class="col-md-8"> -->


<div class="box box-info">
<div class="box-header with-border">
    <!-- <h3 class="box-title">pelanggan</h3> -->
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



<form action="{{ route('pelanggan.update', $pelanggan->id) }}" class="form-horizontal" method="POST" >
    @csrf
    @method('PUT')
    <div class="box-body">

    <div class="form-group ">
        
        <label for="nama" class="col-sm-2 control-label">Nama Pelanggan</label>

        <div class="col-sm-5">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" value="{{ $pelanggan->nama }}">


        </div>
        
    </div>

    <div class="form-group">
        <label for="alamat" class="col-sm-2 control-label">Alamat</label>

        <div class="col-sm-5">
        <textarea name="alamat" id="pelanggan" cols="50" rows="5"class="form-control">{{ trim($pelanggan->alamat) }}
        </textarea>
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