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
        $('#barangkeluar-card').DataTable();
    });
</script>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ml-4">

            <div class="card">


                <div class="card-header bg-primary text-white">
                    Total Barang Keluar
                    <a href="{{route('home')}}" class="btn btn-success" style="margin-left : 60%"><i class="fas fa-backspace">  Back</i></a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="barangkeluar-card">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Jumlah</th>
                                <th>Nama Barang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($barangkeluar as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->jumlah}}</td>
                                <td>{{$data->barang->nm_barang}}</td>
                                <td>

                                        <form action="{{route('barangkeluar.destroy' , $data->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('barangkeluar.edit', $data->id)}}" class="btn btn-info"><i class="fas fa-edit">   Edit</i></a>

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