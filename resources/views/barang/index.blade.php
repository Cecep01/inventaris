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
    <div class="d-flex">
        <div class="col-md-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}

                </div>


            @endif
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
                        Data Barang
                        <button class="btn btn-primary float-right mx-3" data-toggle="modal" data-target="#createModal"><i
                                class="fas fa-plus-square"> Tambah</i></button>

                        <a href="{{ route('cetak-barang') }}" class="btn btn-warning float-right text-light"><i
                                class="fas fa-print" style="color:white"> Laporan</i></a>
                                <a href = "{{ url('exportexcel') }}" class="btn btn-danger float-right mr-2">Export</a>
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

                                  <a href="{{ Route('create-new') }}" class="btn btn-primary">Tambah Barang Baru</a>
                                      <a href="{{ Route('create-old') }}" class="btn btn-danger">Tambah Barang Lama</a>
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

                                        <th> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody @php
                                    $no = 1;
                                @endphp @foreach ($barang as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nm_barang }}</td>
                                        <td>{{ $data->stok}} <span>{{ $data->satuan }}</span></td>
                                        <td>{{ $data->jurusan }}</td>

                                        <td>{{ $data->kondisi }}</td>
                                        <td class="d-flex">
                                            <button class="btn btn-info mr-1" data-toggle="modal"
                                                data-target="#editModal{{ $data->id }}"><i class="fas fa-edit">
                                                    Edit</i></button>

                                                     <button class="btn btn-info mr-1" data-toggle="modal"
                                                data-target="#showModal{{ $data->id }}"><i class="fas fa-edit">
                                                    show</i></button>


                                            <form action="{{ route('barang.destroy', $data->id) }}" method="POST">
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
                                                    @include('barang.edit')

                                                </div>
                                            </div>
                                        </div>
                                     <div class="modal fade" id="showModal{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Show</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('barang.show')

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
