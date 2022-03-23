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

@section('content')

    <div class="container"> 
          <div class="d-flex">
        <div class="col-md-3">
            @if (Session::has('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('gagal') }}
                </div>
            @endif
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-info text-light">Cetak Laporan</div>
                    <div class="card-body">
                        <form action="{{ route('laporanKeluar') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="date" value="{{ old('tanggalawal') }}" name="tanggalawal"
                                    class="form-control @error('tanggalawal') is-invalid @enderror">
                                @error('tanggalawal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" value="{{ old('tanggalakhir') }}" name="tanggalakhir"
                                    class="form-control @error('tanggalakhir') is-invalid @enderror">
                                @error('tanggalakhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                            <div class="form-group">

                                <select name="pilih" class="form-control">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="barang_masuk">Barang Masuk</option>
                                    <option value="barang_keluar">Barang Keluar</option>
                                    <option value="peminjam">Peminjam </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger text-light"><i class="fas fa-undo-alt">
                                        Reset</i></button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Simpan</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($barangs)
        {{ $barangs }}

    @endisset
@endsection
