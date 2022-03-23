@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Buku</h1>
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
                <div class="card-header">Data Buku</div>
                <div class="card-body">

<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="">Foto Barang</label>
        <input type="file" name="gambar" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="">Masukan Barang</label>
        <input type="text" name="nm_barang" value="{{ old('nm_barang') }}"
            class="form-control @error('nm_barang') is-invalid @enderror">
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

    <div class="form-group">
        <label for="">Tanggal Masuk</label>
        <input type="date" name="tgl_masuk" value="{{ old('tgl_masuk') }}"
            class="form-control @error('tgl_masuk') is-invalid @enderror">
        @error('tgl_masuk')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Kondisi</label>
        <textarea name="kondisi" id="" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">jurusan</label>
        <select name="jurusan" value="{{ old('jurusan') }}" id="" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <option value="Rpl">Rpl</option>
            <option value="Tsm">Tsm</option>
            <option value="Tkr">Tkr</option>
        </select>
        @error('jurusan')
            <span class="invalid-feedback" role="alert">
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
