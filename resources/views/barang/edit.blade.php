      <form action="{{ route('barang.update', $data->id) }}" method="post">
          @csrf
          @method ('put')
          <div class="form-group">
              <label for="">Masukkan Nama Barang</label>
              <input type="text" name="nm_barang" value="{{ $data->nm_barang }}"
                  class="form-control @error('nm_barang') is-invalid @enderror">
          </div>
          <div class="form-group">
              <label for="">Stok</label>
              <input type="number" name="stok" value="{{ $data->stok }}"
                  class="form-control @error('stok') is-invalid @enderror">
          </div>
          <div class="form-group">
              <label for="">Tanggal Masuk</label>
              <input type="date" value="{{ $data->tgl_masuk }}" name="tgl_masuk" class="form-control">
          </div>
         <div class="form-group">
             <label for="">Kondisi</label>
             <textarea name="kondisi"  id="" class="form-control">{{ $data->kondisi }}</textarea>
         </div>




          <div class="form-group">
              <label for="">jurusan</label>
              <select name="jurusan" id="" class="form-control">
                  <option value="">-- Pilih Jurusan --</option>
                  <option value="Rpl" {{ $data->jurusan == 'Rpl' ? 'selected' : '' }}>Rpl</option>
                  <option value="Tsm" {{ $data->jurusan == 'Tsm' ? 'selected' : '' }}>Tsm</option>
                  <option value="Tkr" {{ $data->jurusan == 'Tkr' ? 'selected' : '' }}>Tkr</option>

              </select>
          </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

      </form>
