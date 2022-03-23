 <form action="{{ route('peminjam.update', $data->id) }}" method="post" enctype="multipart/form-data">
     @csrf

     @method('put')
     <div class="form-group">
         <label for="">Masukan Nama Peminjam</label>
         <input type="text" name="nm_peminjam" value="{{ $data->nm_peminjam }}"
             class="form-control @error('nm_peminjam') is-invalid @enderror">
         @error('nm_peminjam')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>
     <div class="form-group">
         <label for="">Jenis Kelamin</label>
         <div class="form-check">
             <input class="form-check-input" type="radio" name="jk" value="Laki-Laki" id="flexCheckDefault"
                 {{ $data->jk == 'Laki-Laki' ? 'checked' : '' }}>
             <label class="form-check-label" for="flexCheckDefault">
                 Laki-Laki
             </label>
         </div>
         <div class="form-check">
             <input class="form-check-input" type="radio" name="jk" id="flexCheckChecked" value="Perempuan"
                 {{ $data->jk == 'Perempuan' ? 'checked' : '' }}>
             <label class="form-check-label" for="flexCheckChecked">
                 Perempuan
             </label>
         </div>
     </div>

     <div class="form-group">
         <label for="">No Telepon</label>
         <input type="string" name="no_tlp" value="{{ $data->no_tlp }}"
             class="form-control @error('no_tlp') is-invalid @enderror">
         @error('no_tlp')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>
     <div class="form-group">
         <label for="">Jumlah</label>
         <input type="number" name="jumlah" value="{{ $data->jumlah }}"
             class="form-control @error('jumlah') is-invalid @enderror">
         @error('jumlah')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>

     <div class="form-group">
         <label for="">Tanggal Pinjam</label>
         <input type="date" name="tgl_pinjam" value="{{ $data->tgl_pinjam }}"
             class="form-control @error('tgl_pinjam') is-invalid @enderror">
         @error('tgl_pinjam')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>
     <div class="form-group">
         <label for="">Tanggal Keluar</label>
         <input type="date" name="tgl_kembali" value="{{ $data->tgl_kembali }}"
             class="form-control @error('tgl_kembali') is-invalid @enderror">
         @error('tgl_kembali')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>







     <div class="form-group">
         <label for="">Nama Barang</label>
         <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
             @foreach ($barang as $data)

                     <option value="{{ $data->id }}"
                         {{ $data->id == $data->barang_id ? 'selected="selected"' : '' }}>{{ $data->nm_barang }}
                     </option>
                 
             @endforeach
         </select>
         @error('barang_id')
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
