  <form action="{{ route('pengembalian.store') }}" method="post">
      @csrf
      <div class="form-group">
          <label for="">Masukan Nama Barang</label>
          <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
              @foreach ($barang as $data)
                  <option value="{{ $data->id }}">{{ $data->nm_barang }}</option>
              @endforeach
          </select>
          @error('barang_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
          <label for="">Masukan Nama Peminjam</label>
          <select name="peminjam_id" class="form-control @error('peminjam_id') is-invalid @enderror">
              @foreach ($peminjam as $data)
                  <option value="{{ $data->id }}">{{ $data->nm_peminjam }}</option>
              @endforeach
          </select>
          @error('peminjam_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
          <div class="d-flex">
              <div class="col-7">
                  <label for="">Jumlah Kembali</label>
                  <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                  @error('jumlah')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="col-4">
                  <label for="">satuan</label>
                  <select name="satuan" id="satuan" class="form-control">
                      <option value="meter">meter</option>
                      <option value="pcs">pcs</option>
                  </select>
              </div>
          </div>
      </div>



      <div class="form-group">
          <label for="">Tanggal Kembali</label>
          <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
          @error('tanggal')
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
