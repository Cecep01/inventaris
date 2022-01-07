@extends('adminlte::page')
@section('content_header')
<div class="content-haeder">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0">Tambah Data Barang</h1>

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
                <div class="card-header bg-primary text-white">Data Barang
                </div>
                <div class="card-body">
                    <form action="{{route('barang.store')}}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="">Masukan Barang</label>
              <input type="text" name="nm_barang" class="form-control @error('nm_barang') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
              <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
              <input type="date" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror">
                </div>
                <div class="form-group">
    <label for="">Kondisi</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="kondisi" value = "baik" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        Baik
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="kondisi" id="flexCheckChecked" value="rusak">
    <label class="form-check-label" for="flexCheckChecked">
      Rusak
    </label>
  </div>
  </div>

<div class="form-group">
<label for="">jurusan</label>
<select name="jurusan" id="" class="form-control">
   <option value="rpl">Rpl</option>
   <option value="tsm">Tsm</option>
   <option value="tkr">Tkr</option>
</select>
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
