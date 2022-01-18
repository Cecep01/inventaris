<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Masukan Barang</label>
        <input type="text" name="nm_barang" value= "{{ old('nm_barang') }}" class="form-control @error('nm_barang') is-invalid @enderror">
        @error('nm_barang')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Stok</label>
        <input type="number" name="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror">
        @error('stok')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Tanggal Masuk</label>
        <input type="date" name="tgl_masuk" value="{{ old('tgl_masuk') }}" class="form-control @error('tgl_masuk') is-invalid @enderror">
        @error('tgl_masuk')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Kondisi</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="{{ old('kondisi') }}" name="kondisi" value="baik" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Baik
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="{{ old('kondisi') }}" name="kondisi" id="flexCheckChecked" value="rusak">
            <label class="form-check-label" for="flexCheckChecked">
                Rusak
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="">jurusan</label>
        <select name="jurusan" value="{{ old('jurusan') }}" id="" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <option value="Rpl">Rpl</option>
            <option value="Tsm">Tsm</option>
            <option value="Tkr">Tkr</option>
        </select>
         @error('jurusan')
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
