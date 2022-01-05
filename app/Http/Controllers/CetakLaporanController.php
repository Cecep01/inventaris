<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CetakLaporanController extends Controller
{
    public function store(Request $request){

        $barangs = Barang::where('tgl_masuk', 'LIKE', '%'.$request->tanggal.'%')->get();
        return redirect()->route('cetak-laporan.barang.index');     
    }
 public function create()
{
  return view('cetak.barang.create');
}

}
