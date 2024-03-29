<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BaranngKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = BaranngKeluar::all();
        return response()-> json([
            'succes' => true ,
            'message' => 'Data Barang Keluar',
            'data' => $barangkeluar,
        ], 200 );



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $barangkeluar = new BaranngKeluar;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->tgl_keluar = $request->tgl_keluar;
        $barangkeluar->jurusan = $request->jurusan;
        $barangkeluar->kondisi = $request->kondisi;
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->save();
        return response()->json([
            'success' => true ,
            'message' => 'berhasil menambahkan data',
            'data' => $barangkeluar,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangkeluar = BaranngKeluar::findOrfail($id);
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->tgl_keluar = $request->tgl_keluar;
        $barangkeluar->jurusan = $request->jurusan;
        $barangkeluar->kondisi = $request->kondisi;
        $barangkeluar->barang_id = $request->barang_id;
        $barangkeluar->save();
        return response()->json([
            'success' => true,
            'message' => 'berhasil menambahkan data',
            'data' => $barangkeluar,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = BaranngKeluar::findOrFail($id);
        $barangkeluar->delete();
        return response()->json([
            'success' => true,
            'message' => 'berhasil menambahkan data',
            'data' => $barangkeluar,
        ], 200);
    }
}
