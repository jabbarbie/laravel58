@extends('layouts.master')
@section('title', 'Data Users')

@section('content')
<!--  -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <a href="{{ url('users/create') }}" class="btn btn-primary ">Tambah User</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover" id="punyaDataTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th width='18%'>Aksi</th>
                    </tr>
            </thead>
            
            <tbody>
                @foreach( $users as $s )
                <tr>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->email }}</td>
                 
                    <td>
                        <form action="{{ route('users.destroy', $s->id) }}" class="d-inline" method="POST">
                        <a href="{{ route('users.show', $s->id) }}/edit" class="btn btn-primary btn-sm d-inline">Ubah</a>
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