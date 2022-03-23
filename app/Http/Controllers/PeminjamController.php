<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        $barang = Barang::all();
        return view('peminjam.index', compact('peminjam', 'barang'));
    }

    public function cetak_peminjam()
    {
        $peminjam = Peminjam::all();

        return view('peminjam.cetak-peminjam', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('peminjam.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_peminjam' => ['required'],
            'jk' => ['required'],
            'no_tlp' => ['required', 'min:11', 'max:12'],
            'jumlah' => ['required'],
            'tgl_pinjam' => ['required'],
            'tgl_kembali' => ['required'],
            'barang_id' => ['required'],

        ]);
        if ($request->tgl_kembali < $request->tgl_pinjam) {
            return redirect()->back()->with('gagal', 'Tanggal tidak valid');
        } else {
            $peminjam = new Peminjam;
            $peminjam->nm_peminjam = $request->nm_peminjam;
            $peminjam->jk = $request->jk;
            $peminjam->no_tlp = $request->no_tlp;
            $peminjam->jumlah = $request->jumlah;
            $peminjam->tgl_pinjam = $request->tgl_pinjam;
            $peminjam->tgl_kembali = $request->tgl_kembali;
            $peminjam->barang_id = $request->barang_id;

            $peminjam->save();

            $barang = Barang::findOrFail($request->barang_id);
            $barang->stok -= $request->jumlah;
            $barang->save();


            Alert::success('Succes , Data Peminjam Berhasil di tambahkan');
                return redirect()->route('peminjam.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $barang = Barang::all();
        return view('peminjam.show', compact('peminjam', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $barang = Barang::all();
        return view('peminjam.edit', compact('peminjam', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_peminjam' => ['required'],
            'jk' => ['required'],
            'no_tlp' => ['required', 'min:11', 'max:12'],
            'jumlah' => ['required'],
            'tgl_pinjam' => ['required'],
            'tgl_kembali' => ['required'],
            'barang_id' => ['required'],

        ]);


        if ($request->tgl_kembali < $request->tgl_pinjam) {
            return redirect()->back()->with('gagal', 'Tanggal tidak valid');
        } else {
            $peminjam = Peminjam::findOrFail($id);
            $peminjam->nm_peminjam = $request->nm_peminjam;
            $peminjam->jk = $request->jk;
            $peminjam->no_tlp = $request->no_tlp;
            $peminjam->jumlah = $request->jumlah;
            $peminjam->tgl_pinjam = $request->tgl_pinjam;
            $peminjam->tgl_kembali = $request->tgl_kembali;
            $peminjam->barang_id = $request->barang_id;
            $peminjam->save();

            $barang = Barang::findOrFail($request->barang_id);
            $barang->stok -= $request->jumlah;
            $barang->save();

            return redirect()->route('peminjam.index')->with('success', 'Peminjam berhasil di edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->back()->with('gagal', 'data berhasil di hapus');
    }

    public function peminjam_card()
    {
        $barang = Barang::all();
        $peminjam = Peminjam::all();
        return view('peminjam.peminjam-card', compact('peminjam' , 'barang'));
    }
}
