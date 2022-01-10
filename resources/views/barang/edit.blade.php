      <form action="{{ route('barang.update', $data->id) }}" method="post">
                                                        @csrf
                                                        @method ('put')
                                                        <div class="form-group">
                                                            <label for="">Masukkan Nama Barang</label>
                                                            <input type="text" name="nm_barang"
                                                                value="{{ $data->nm_barang }}"
                                                                class="form-control @error('nm_barang') is-invalid @enderror">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Stok</label>
                                                            <input type="number" name="stok" value="{{ $data->stok }}"
                                                                class="form-control @error('stok') is-invalid @enderror">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tanggal Masuk</label>
                                                            <input type="date" value="{{ $data->tgl_masuk }}"
                                                                name="tgl_masuk" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Kondisi</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="kondisi" value="baik"
                                                                    id="flexCheckDefault" {{ $data->kondisi == 'baik' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Baik
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="kondisi" value="rusak" {{ $data->kondisi == 'rusak' ? 'checked' : '' }}
                                                                    id="flexCheckChecked">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Rusak
                                                                </label>
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="">jurusan</label>
                                                            <select name="jurusan" id="" value="{{ $data->jurusan }}"
                                                                class="form-control">
                                                                <option value="Rpl">Rpl</option>
                                                                <option value="Tsm">Tsm</option>
                                                                <option value="Tkr">Tkr</option>

                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                                </form>
