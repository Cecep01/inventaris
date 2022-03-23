@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Barang Lama</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang Lama</div>
                <div class="card-body">

<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div class="form-group">
        <label for="">Masukan Barang</label>
        <select name="barang_id" class="form-control"  id="">
            @foreach ($barang as $data )
            <option value="{{ $data->id }}">{{ $data->nm_barang }}</option>

            @endforeach
        </select>
        @error('nm_barang')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <div class="d-flex">
            <div class="col-8">
                <label for="">Stok</label>

                <input type="number" name="stok" value="{{ old('stok') }}"
                    class="form-control @error('stok') is-invalid @enderror">
            </div>
            <div class="col-4">
                <label for="">Satuan</label>

                <select name="satuan" id="satuan" class="form-control">
                    <option value="meter">Meter</option>
                    <option value="senti meter">CM</option>
                </select>
            </div>

        </div>

        @error('stok')
            <span class="invalid-feedback" role="ale0rt">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>


</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
