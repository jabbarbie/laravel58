@extends('layouts.master')
@section('title', 'Data Transaksi Penjualan')

@section('content')
<!--  -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <a href="{{ url('penjualan/create') }}" class="btn btn-primary ">Tambah Data penjualan</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover" id="punyaDataTable">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Pembayaran</th>                    
                    <th>Total Pembayaran</th>

                    <th width='18%'>Aksi</th>
                    </tr>
            </thead>
            
            <tbody>
                @foreach( $penjualan as $s )
                <tr>
                    <td>{{ $s->tanggal_transaksi }}</td>
                    <td>{{ $s->pelanggan->nama }}</td>
                    <td>{{ $s->jenis_pembayaran }}</td>

                    <td>{{ number_format($s->total_pembayaran) }}</td>

                    <td>
                        <form action="{{ route('penjualan.destroy', $s->id) }}" class="d-inline" method="POST">
                        <a href="{{ route('detail.edit', $s->id) }}" class="btn btn-primary btn-sm d-inline">Detail</a>
                        
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