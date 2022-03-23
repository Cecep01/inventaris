<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">

    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$data->barang->nm_barang}}</h5>
        <p class="card-text">
              <div class="d-flex">
          <div class="col-6">Peminjam</div>
          <div class="col-6">{{ $data->nm_peminjam }}</div>
        </div>
        <div class="d-flex">
          <div class="col-6">Jenis Kelamin</div>
          <div class="col-6">{{ $data->jk }} </div>
        </div>
        
         <div class="d-flex">
          <div class="col-6">No Telepon</div>
          <div class="col-6">{{ $data->no_tlp }}</div>
        </div>
          <div class="d-flex">
          <div class="col-6">Jumlah</div>
          <div class="col-6">{{ $data->jumlah }}</div>
        </div>
          <div class="d-flex">
          <div class="col-6">Tanggal Pinjam</div>
          <div class="col-6">{{ $data->tgl_pinjam }}</div>
        </div>
          <div class="d-flex">
          <div class="col-6">Tanggal Kembali</div>
          <div class="col-6">{{ $data->tgl_kembali }}</div>
        </div>

        </p>

      </div>
    </div>
  </div>
</div>
