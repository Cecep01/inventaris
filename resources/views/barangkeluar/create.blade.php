@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0">Barang Keluar</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Form Barang Keluar</div>
                <div class="card-body">
                   <form action="{{route('barangkeluar.update')}}" method="post">
                        @csrf




                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                             @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror">
                             @error('tgl_keluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jurusam</label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                             @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Kondisi</label>
                            <input type="text" name="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                             @error('kondisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Barang</label>
                            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" >
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->nm_barang}}</option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>









                        <div class="form-group">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt">   Reset</i></button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save">    Simpan</i></button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
