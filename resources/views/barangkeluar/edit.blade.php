<form action="{{ route('barangkeluar.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    @method('put')
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
        <label for="">Tanggal Keluar</label>
        <input type="date" name="tgl_keluar" value="{{ $data->tgl_keluar }}"
            class="form-control @error('tgl_keluar') is-invalid @enderror">
        @error('tgl_keluar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">jurusan</label>
        <select name="jurusan" id="" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <option value="Rpl" {{ $data->jurusan == 'Rpl' ? 'selected' : '' }}>Rpl</option>
            <option value="Tsm" {{ $data->jurusan == 'Tsm' ? 'selected' : '' }}>Tsm</option>
            <option value="Tkr" {{ $data->jurusan == 'Tkr' ? 'selected' : '' }}>Tkr</option>

        </select>
        <div class="form-group">
            <label for="">Kondisi</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="flexCheckChecked" value="rusak"
                    {{ $data->kondisi == 'rusak' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckChecked">
                    Rusak
                </label>
            </div>
        </div>
     <div class="form-group">
         <label for="">Nama Barang</label>
         <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
             @foreach ($barang as $data)
                 @if ($data->kondisi == 'rusak')
                     <option value="{{ $data->id }}"
                         {{ $data->id == $data->barang_id ? 'selected="selected"' : '' }}>{{ $data->nm_barang }}
                     </option>
                 @endif
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
