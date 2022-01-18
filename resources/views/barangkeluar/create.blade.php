 <form action="{{route('barangkeluar.store')}}" method="post">
                        @csrf




                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                             @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror">
                             @error('tgl_keluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     <div class="form-group">
                                <label for="">Jurusan</label>
                                <select name="jurusan" id=""
                                    class="form-control @error('jurusan') is-invalid @enderror">
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
                            <div class="form-group">
                                <label for="">Kondisi</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kondisi" value="rusak"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Rusak
                                    </label>
                                </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Barang</label>
                            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" >
                                @foreach($barang as $data)
                                @if ($data->kondisi == 'rusak')


                                    <option value="{{$data->id}}">{{$data->nm_barang}}</option>
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
                </div>




