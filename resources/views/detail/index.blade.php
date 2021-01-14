@extends('layouts.master')
@section('title', 'Detail Transaksi Penjualan')

@section('content')
<!--  -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover" id="punyaDataTable">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pelanggan</th>

                    <th width='18%'>Aksi</th>
                    </tr>
            </thead>
            
            <tbody>
                @foreach( $penjualan as $s )
                <tr>
                    <td>{{ $s->tanggal_transaksi }}</td>
                    <td>{{ $s->pelanggan->nama }}</td>


                    <td>
                        <form action="{{ route('detail.destroy', $s->id) }}" class="d-inline" method="POST">
                        <a href="{{ route('detail.edit', $s->id) }}" class="btn btn-info btn-sm d-inline">Detail</a>
                        
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