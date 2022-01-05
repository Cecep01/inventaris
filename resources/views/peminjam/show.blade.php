@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0">Show Data peminjam</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <a href="{{route('peminjam.store')}}" class="btn btn-success"><i class="fas fa-backspace">  Back</i></a>
            <div class="card">
                <div class="card-header">Data Program</div>
                <div class="card-body">
                   <form action="{{route('peminjam.update' , $peminjam->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf

                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Nama Peminjam</label>
                            <input type="text" name="nm_peminjam" value= "{{$peminjam->nm_peminjam}}" class="form-control @error('nm_peminjam') is-invalid @enderror" disabled>
                             @error('nm_peminjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" name="jk" value="{{$peminjam->jk}}" class="form-control @error('jk') is-invalid @enderror" disabled>
                             @error('jk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" value="{{$peminjam->status}}" class="form-control @error('status') is-invalid @enderror" disabled>
                             @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="string" name="no_tlp" value="{{$peminjam->no_tlp}}" class="form-control @error('no_tlp') is-invalid @enderror" disabled>
                             @error('no_tlp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" value = "{{$peminjam->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror" disabled>
                             @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" value="{{$peminjam->tgl_pinjam}}" class="form-control @error('tgl_pinjam') is-invalid @enderror" disabled>
                             @error('tgl_pinjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" name="tgl_kembali" value="{{$peminjam->tgl_kembali}}" class="form-control @error('tgl_kembali') is-invalid @enderror" disabled>
                             @error('tgl_kembali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>







                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" disabled >
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}" {{$data->id == $peminjam->barang_id ? 'selected="selected"' : '' }}>{{$data->nm_barang}}</option>
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
