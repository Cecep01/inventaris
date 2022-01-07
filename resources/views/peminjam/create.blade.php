@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0" style="font-size: 40px">Tambah Data peminjam</h1>
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
                <div class="card-header bg-primary text-white"><b>Form Peminjam</b></div>
                <div class="card-body">
                   <form action="{{route('peminjam.store')}}" method="post">
                        @csrf


                        <div class="form-group">
                            <label for="">Masukan Nama Peminjam</label>
                            <input type="text" name="nm_peminjam" class="form-control @error('nm_peminjam') is-invalid @enderror">
                             @error('nm_peminjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control @error('jk') is-invalid @enderror">
                             @error('jk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror">
                             @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="string" name="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror">
                             @error('no_tlp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            <label for="">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control @error('tgl_pinjam') is-invalid @enderror">
                             @error('tgl_pinjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control @error('tgl_kembali') is-invalid @enderror">
                             @error('tgl_kembali')
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
