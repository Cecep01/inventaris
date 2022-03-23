<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset($data->gambar)}} " class="img-fluid rounded-start" alt="..." >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$data->nm_barang}}</h5>
        <p class="card-text">
        <div class="d-flex">
          <div class="col-6">Stok</div>
          <div class="col-6">{{ $data->stok }} <span>{{ $data->satuan }}</span></div>
        </div>
         <div class="d-flex">
          <div class="col-6">Jurusan</div>
          <div class="col-6">{{ $data->jurusan }}</div>
        </div>
         <div class="d-flex">
          <div class="col-6">Kondisi</div>
          <div class="col-6">{{ $data->kondisi }}</div>
        </div>

        </p>
        <p class="card-text"><small class="text-muted">Tanggal   {{ $data->tgl_masuk }}</small></p>
      </div>
    </div>
  </div>
</div>
