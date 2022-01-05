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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Data Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="barang">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
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
                                <td>
                                    <form action="{{route('hapus' , $data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang.edit', $data->id)}}" class="btn btn-info"><i class="fas fa-edit">   Edit</i></a>

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
