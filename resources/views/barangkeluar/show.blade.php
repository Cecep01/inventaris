@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0">Show Data Barang Keluar</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <a href="{{route('barangkeluar.store')}}" class="btn btn-success"><i class="fas fa-backspace">  Back</i></a>
            <div class="card">
                <div class="card-header">Data Barang Keluar</div>
                <div class="card-body">
                   <form action="{{route('barangkeluar.update' , $barangkeluar->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf

                        @method('put')
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" value = "{{$barangkeluar->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror" disabled>
                             @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" value="{{$barangkeluar->tgl_keluar}}" class="form-control @error('tgl_keluar') is-invalid @enderror" disabled>
                             @error('tgl_keluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jurusam</label>
                            <input type="text" name="jurusan" value="{{$barangkeluar->jurusan}}" class="form-control @error('jurusan') is-invalid @enderror" disabled>
                             @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Barang</label>
                            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" disabled>
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




                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
