<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BaranngKeluar;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class CetakLaporanController extends Controller
{
    public function laporanKeluar()
    {
        return view('cetak.print.create');
    }

    public function cetaklaporanKeluar(Request $request)
    {
        $start = $request->tanggalawal;
        $end = $request->tanggalakhir;

        if ($start < $end) {
            if ($request->pilih == 'barang_masuk') {
                $laporan = Barang::whereBetween('tgl_masuk', [$start, $end])->get();
                return view('cetak.print.barang-masuk', compact('laporan' , 'start' , 'end'));
            } else if ($request->pilih == 'barang_keluar') {
                $laporan = BaranngKeluar::whereBetween('tgl_keluar', [$start, $end])->get();
                return view('cetak.print.barang-keluar', compact('laporan' , 'start' , 'end'));
            } else {
                $laporan = Peminjam::whereBetween('tgl_kembali', [$start, $end])->get();
                return view('cetak.print.peminjam', compact('laporan' , 'start' , 'end'));
            }
        } else {
            return redirect()->back()->with('gagal', 'Tanngal tidak valid');
        }
    }
}
