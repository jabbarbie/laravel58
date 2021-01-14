@extends('layouts.master')
@section('title', 'Data Sepatu')

@section('content')
<!--  -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <a href="{{ url('sepatu/create') }}" class="btn btn-primary ">Tambah Data Sepatu</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover" id="punyaDataTable">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Ukuran</th>
                    <th width='18%'>Aksi</th>
                    </tr>
            </thead>
            
            <tbody>
                @foreach( $sepatu as $s )
                <tr>
                    <td>{{ $s->kode_barang }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ number_format($s->harga) }}</td>
                    <td>
                        @if ( (int) $s->stok <= 3)
                            <span class="badge badge-danger">{{ $s->stok }}</span>
                        @else
                            <span class="badge badge-success">{{ $s->stok }}</span>
                        @endif
                    </td>
                    <td>{{ $s->ukuran }}</td>
                    <td>
                        <form action="{{ route('sepatu.destroy', $s->id) }}" class="d-inline" method="POST">
                        <a href="{{ route('sepatu.show', $s->id) }}/edit" class="btn btn-primary btn-sm d-inline">Ubah</a>
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