<?php

namespace App\Http\Controllers;

use App\Models\BaranngKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BaranngKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = BaranngKeluar::all();
        $barang = Barang::all();
        return view('barangkeluar.index' , compact('barangkeluar' , 'barang'));
    }


    public function cetak_barangkeluar()
    {
        $barangkeluar = BaranngKeluar::all();
        return view('barangkeluar.cetak-barangkeluar' , compact('barangkeluar'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('barangkeluar.create' , compact('barang'));
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
            'jumlah' => ['required'],
            'tgl_keluar' => ['required'],
            'jurusan' => ['required'],
            'kondisi' => ['required'],
            'barang_id' => ['required'],


        ]);
       $barangkeluar = new BaranngKeluar;
       $barangkeluar->jumlah = $request -> jumlah;
       $barangkeluar->tgl_keluar = $request->tgl_keluar;
       $barangkeluar->jurusan = $request->jurusan;
       $barangkeluar->kondisi = $request->kondisi;
       $barangkeluar->barang_id = $request->barang_id;
       $barangkeluar->save();
       $barang = Barang::findOrFail($request->barang_id);
       $barang->stok -= $request->jumlah;
       $barang->save();

        return redirect()->route('barangkeluar.index')->with('success' , 'barang berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangkeluar = BaranngKeluar::findOrFail($id);

        $barang = Barang::all();
        return view('barangkeluar.show', compact('barangkeluar', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangkeluar = BaranngKeluar::findOrFail($id);

        $barang = Barang::all();
        return view('barangkeluar.edit', compact('barangkeluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'jumlah' => ['required'],
            'tgl_keluar' => ['required'],
            'jurusan' => ['required'],
            'kondisi' => ['required'],
            'barang_id' => ['required'],


        ]);
       $barangkeluar = BaranngKeluar::findOrfail($id);
       $barangkeluar->jumlah = $request -> jumlah;
       $barangkeluar->tgl_keluar = $request->tgl_keluar;
       $barangkeluar->jurusan = $request->jurusan;
       $barangkeluar->kondisi = $request->kondisi;
       $barangkeluar->barang_id = $request->barang_id;
       $barangkeluar->save();
       $barang = Barang::findOrFail($request->barang_id);
       $barang->stok -= $request->jumlah;
       $barang->save();




        return redirect()->route('barangkeluar.index')->with('success' , 'Data Berhasil DIedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = BaranngKeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->back()->with('gagal' , 'data berhasil di hapus');
    }
    public function card()
    {
        $barangkeluar = BaranngKeluar::all();
        $barang = Barang::all();
        return view('barangkeluar.barangkeluar-card' , compact('barangkeluar' , 'barang'));
    }
}
