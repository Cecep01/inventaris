@extends('adminlte::page')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection


@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
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
                    <div class="card-header bg-info text-light">
                        Data Barang
                        <button class="btn btn-primary float-right mx-3" data-toggle="modal" data-target="#createModal"><i
                                class="fas fa-edit"> Tambah</i></button>

                        <a href="{{ route('getlaporanKeluar') }}" class="btn btn-warning float-right text-light"><i
                                class="fas fa-print" style="color:white"> Laporan</i></a>
                    </div>

                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                        aria-labelledby="createModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('barang.create')

                                </div>

                            </div>
                        </div>
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
                                <tbody @php
                                    $no = 1;
                                @endphp @foreach ($barang as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nm_barang }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->jurusan }}</td>
                                        <td>{{ $data->kondisi }}</td>
                                        <td class="d-flex">
                                            <button class="btn btn-info mr-1" data-toggle="modal"
                                                data-target="#editModal"><i class="fas fa-edit"> Edit</i></button>

                                            <form action="{{ route('barang.destroy', $data->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('barang.show', $data->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-eye"> Show</i></a>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
