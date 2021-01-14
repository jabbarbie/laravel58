@extends('layouts.master')
@section('title', 'Tambah Data Users')

@section('content')
<!-- <div class="row">
    <div class="col-md-8"> -->


<div class="box box-info">
<div class="box-header with-border">
    <!-- <h3 class="box-title">users</h3> -->
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



<form action="{{ route('users.store') }}" class="form-horizontal" method="POST" >
    @csrf
    <div class="box-body">

    <div class="form-group ">
        
        <label for="username" class="col-sm-2 control-label">Username</label>

        <div class="col-sm-5">
        <input type="text" class="form-control" id="username" name="name" placeholder="Username" autofocus required="required">


        </div>
        
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
        </div>
    </div>
    

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="password" required="required">
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