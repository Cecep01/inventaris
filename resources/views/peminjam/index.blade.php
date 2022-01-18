@extends('adminlte::page')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0" style="text-align: center;">Data Peminjam</h1>
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
    <div class="d-flex">
        <div class="col-md-3">

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>

            @endif

            @error('status')
            <div class="alert alert-danger" role="alert">
                <p>Status Harus diisi</p>
            </div>


            @enderror


            @if (Session::has('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('gagal') }}
                </div>
            @endif

        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header bg-info text-light">
                        Data Peminjam
                        <button class="btn btn-primary float-right mx-3" data-toggle="modal" data-target="#createModal"><i
                                class="fas fa-plus-square"> Tambah</i></button>

                        <a href="{{ route('cetak-peminjam') }}" class="btn btn-warning float-right text-light"><i
                                class="fas fa-print" style="color:white"> Laporan</i></a>
                    </div>

                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                        aria-labelledby="createModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">Tambah Data Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('peminjam.create')

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
                                        <th>Nama Peminjam</th>
                                        <th>No Telepon</th>
                                        <th>Jumlah</th>
                                        <th>Nama Barang</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($peminjam as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nm_peminjam }}</td>
                                            <td>{{ $data->no_tlp }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>{{ $data->barang->nm_barang }}</td>
                                            <td class="d-flex">
                                                <button class="btn btn-info mr-1" data-toggle="modal"
                                                    data-target="#editModal{{ $data->id }}"><i class="fas fa-edit"> Edit</i></button>

                                                <form action="{{ route('peminjam.destroy', $data->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('apakah anda yakin menghapus ini?');"><i
                                                            class="fas fa-trash-alt"> Delete</i></button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog"
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
