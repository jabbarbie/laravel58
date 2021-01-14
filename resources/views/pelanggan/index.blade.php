@extends('layouts.master')
@section('title', 'Data Pelanggan')

@section('content')
<!--  -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <a href="{{ url('pelanggan/create') }}" class="btn btn-primary ">Tambah Data Pelanggan</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover" id="punyaDataTable">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th width='18%'>Aksi</th>
                    </tr>
            </thead>
            
            <tbody>
                @foreach( $pelanggan as $s )
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        <form action="{{ route('pelanggan.destroy', $s->id) }}" class="d-inline" method="POST">
                        <a href="{{ route('pelanggan.show', $s->id) }}/edit" class="btn btn-primary btn-sm d-inline">Ubah</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm  d-inline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
<!--  -->
@endsection