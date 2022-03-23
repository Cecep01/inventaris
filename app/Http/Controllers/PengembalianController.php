<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $peminjam = Peminjam::where('status', 0)->get();
        $pengembalian = Pengembalian::all();
        return view('pengembalian.index', compact('barang', 'peminjam', 'pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('pengembalian.create', compact('barang', 'peminjam'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $peminjam = Peminjam::find($request->peminjam_id);

        $request->validate([
            'jumlah' => ['required', 'integer', 'size:' . $peminjam->jumlah]
        ]);

        $pengembalian = new Pengembalian;
        $pengembalian->jumlah = $request->jumlah;
        $pengembalian->satuan = $request->satuan;
        $pengembalian->barang_id = $request->barang_id;
        $pengembalian->peminjam_id = $request->peminjam_id;
        $pengembalian->tanggal = $request->tanggal;
        $pengembalian->denda = 0;
        $pengembalian->save();
        $peminjam = Peminjam::findOrfail($request->peminjam_id);
        $peminjam->status = 1;
        $peminjam->save();
        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();
        return redirect()->route('pengembalian.index')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
