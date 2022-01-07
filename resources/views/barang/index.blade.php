@extends('adminlte::page')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0" style="text-align: center;">Data Barang</h1>
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
        $('#barang').DataTable();
    });
</script>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Data Barang
                    <a href="{{route('barang.create')}}" class="btn btn-primary float-right br-0" style="margin-left: 30px"><i class="fas fa-plus-square">   Tambah</i></a>
                    <a href="{{route('cetak-barang')}}" class="btn btn-warning float-right" ><i class="fas fa-print" style="color:white">  Cetak</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="barang">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Jurusan</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($barang as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nm_barang}}</td>
                                <td>{{$data->stok}}</td>
                                <td>{{$data->jurusan}}</td>
                                <td>{{$data->kondisi}}</td>
                                <td>
                                    <form action="{{route('barang.destroy' , $data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang.edit', $data->id)}}" class="btn btn-info"><i class="fas fa-edit">   Edit</i></a>
                                            <a href="{{route('barang.show' ,$data->id)}}" class="btn btn-warning"><i class="fas fa-eye">  Show</i></a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus ini?');"><i class="fas fa-trash-alt">   Delete</i></button>
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
