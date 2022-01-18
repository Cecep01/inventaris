<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
     return response()->json( [
         'success' => true,
         'message' => 'data barang masuk',
         'data' => $barang ,
     ], 200);

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
        $barang = new Barang;
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->jurusan = $request->jurusan;

        $barang->save();
        return response()->json([
            'success' => true,
            'message' => 'data berhasil di tambah',
            'data' => $barang,
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

        $barang = Barang::findOrfail($id);
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->jurusan = $request->jurusan;

        $barang->save();
        return response()->json([
            'success' => true,
            'message' => 'data berhasil di edit',
            'data' => $barang,
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
        //
    }
}
