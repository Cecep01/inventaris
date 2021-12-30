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
        return view('barangkeluar.index' , compact('barangkeluar'));
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
            'barang_id' => ['required'],
       

        ]);
       $barangkeluar = new BaranngKeluar;
       $barangkeluar->jumlah = $request -> jumlah;
       $barangkeluar->tgl_keluar = $request->tgl_keluar;
       $barangkeluar->jurusan = $request->jurusan;
       $barangkeluar->barang_id = $request->barang_id;
       $barangkeluar->save();

        return redirect()->route('barangkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BaranngKeluar $baranngKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BaranngKeluar $baranngKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaranngKeluar $baranngKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaranngKeluar  $baranngKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaranngKeluar $baranngKeluar)
    {
        //
    }
}
