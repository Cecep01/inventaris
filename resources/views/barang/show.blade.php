@extends('adminlte::page')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="text-center m-0">Show Data Pengurus</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('barang.store')}}" class="btn btn-success"><i class="fas fa-backspace">  Back</i></a>

<div class="form-group">
<label for = "">Masukkan Nama Barang</label>
<input type="text" name="nm_barang" value = "{{$barang->nm_barang}}" class = "form-control @error('nm_barang') is-invalid @enderror" disabled>
</div>
<div class="form-group">
<label for = "">Stok</label>
<input type="number" name="stok" value = "{{$barang->stok}}" class = "form-control @error('stok') is-invalid @enderror" disabled>
</div>
<div class="form-group">
   <label for="">Tanggal Masuk</label>
   <input type="date" value = "{{$barang->tgl_masuk}}" name="tgl_masuk" class="form-control" disabled>
</div>
<div class="form-group">
    <label for="">Kondisi</label>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="kondisi" value="{{$barang->kondisi}}" id="flexCheckDefault" disabled>
    <label class="form-check-label" for="flexCheckDefault">
        Baik
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="kondisi" value="{{$barang->kondisi}}" id="flexCheckChecked" disabled>
    <label class="form-check-label" for="flexCheckChecked">
      Rusak
    </label>
  </div>
  </div>

<div class="form-group">
<label for="">jurusan</label>
<select name="jurusan" id="" value = "{{$barang->jurusan}" class="form-control" disabled>
   <option value="rpl">Rpl</option>
   <option value="tsm">Tsm</option>
   <option value="tkr">Tkr</option>

</select>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
