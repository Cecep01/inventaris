<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index' , compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a  newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['nm_barang' => 'required',
            'stok' => 'required',
            'tgl_masuk' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'jurusan' => 'required' ,
       

               
        ]);
        $barang = new Barang;
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->status = $request->status;
        $barang->jurusan = $request->jurusan;
    
        $barang->save();
        return redirect()->route('barang.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $barang = Barang::findOrFail($id);
     return view('barang.show' , compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit' , compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            ['nm_barang' => 'required',
            'stok' => 'required',
            'tgl_masuk' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'jurusan' => 'required' ,


               
        ]);
        
        $barang = Barang::findOrFail($id);
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->status = $request->status;
        $barang->jurusan = $request->jurusan;
  
        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}