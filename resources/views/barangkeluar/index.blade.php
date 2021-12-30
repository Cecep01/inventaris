@extends('adminlte::page')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0" style="text-align: center;">Barang Keluar</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
@endsection


@section('js')
<script src="{{ asset('DataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#baranngkeluar').DataTable();
    });
</script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Barang Keluar
                    <a href="{{route('barangkeluar.create')}}" class="btn btn-primary float-right">Tambah barangkeluar</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="baranngkeluar">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                 
                                    <th>Jumlah</th>
                                    <th>Tanggal Keluar</th>
                                    <th>jurusan</th>
                                    <th>Nama Barang</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($barangkeluar as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                 
                                    <td>{{$data->jumlah}}</td>
                                    <td>{{$data->tgl_keluar}}</td>
                                    <td>{{$data->jurusan}}</td>
                                    <td>{{$data->barang->nm_barang}}</td>
                                   
                                    <td>
                                        <form action="{{route('barangkeluar.destroy' , $data->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('barangkeluar.edit', $data->id)}}" class="btn btn-outline-info">Edit</a>
                                            <a href="{{route('barangkeluar.show' ,$data->id)}}" class="btn btn-outline-warning">Show</a>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin menghapus ini?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection