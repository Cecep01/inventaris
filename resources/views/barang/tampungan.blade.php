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
        $('#tampungan').DataTable();
    });
</script>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Total Barang
                    <a href="{{route('home')}}" class="btn btn-info col-md-3" style="margin-left : 60%"><i class="fas fa-backspace">  Back</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="tampungan">
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
                              <td class="d-flex">
                                            <button class="btn btn-info mr-1" data-toggle="modal"
                                                data-target="#editModal"><i class="fas fa-edit"> Edit</i></button>

                                            <form action="{{ route('barang.destroy', $data->id) }}" method="POST">
                                                @method('delete')
                                                @csrf

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('apakah anda yakin menghapus ini?');"><i
                                                        class="fas fa-trash-alt"> Delete</i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('barang.edit')

                                                </div>
                                            </div>
                                        </div>
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
