@extends('adminlte::page')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0" style="text-align: center;">Data Pengembalian</h1>
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
            $('#peminjam').DataTable();
        });
    </script>

@endsection

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-light">
                        Data Pengembalian
                        <button class="btn btn-primary float-right mx-3" data-toggle="modal" data-target="#createModal"><i
                                class="fas fa-plus-square"> Tambah</i></button>


                    </div>

                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                        aria-labelledby="createModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">Pengembalian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('pengembalian.create')

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="peminjam">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>

                                        <th>Nama Barang</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>denda</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengembalian as $data)
                                        <tr>


                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->barang->nm_barang }}</td>
                                            <td>{{ $data->peminjam->nm_peminjam }}</td>
                                            <td>{{ $data->tanggal}}</td>
                                            <td>{{ $data->denda }}</td>
                                            <td class="d-flex">
                                                <button class="btn btn-info mr-1" data-toggle="modal"
                                                    data-target="#editModal{{ $data->id }}"><i class="fas fa-edit">
                                                        Edit</i></button>
                                                        <button class="btn btn-info mr-1" data-toggle="modal"
                                                data-target="#showModal{{ $data->id }}"><i class="fas fa-edit">
                                                    show</i></button>

                                                <form action="{{ route('peminjam.destroy', $data->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf


                                                    <button type="submit" class="btn btn-danger delete-confirm"
                                                        ><i
                                                            class="fas fa-trash-alt"> Delete</i></button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                                        @include('peminjam.edit')

                                                    </div>
                                                </div>
                                            </div>

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
