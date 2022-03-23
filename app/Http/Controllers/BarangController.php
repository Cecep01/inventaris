<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function index()
    {
        $barang = Barang::all();
        return view('barang.index' , compact('barang'));
    }




    public function cetak_barang()
    {
        $barang = Barang::all();
        return view('barang.cetak-barang' , compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a  newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('gambar')) {
            $image = $request->file('gambar')->store('foto/barang', ['disks' => 'local']);
        }else{
            $image = null;
        }
        $validated = $request->validate(
            ['nm_barang' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'tgl_masuk' => 'required',
            'kondisi' => 'required',
            'jurusan' => 'required' ,



        ]);
        $barang = new Barang;
        $barang->gambar = $image;
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->satuan = $request->satuan;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->jurusan = $request->jurusan;


        $barang->save();
        Alert::success('Berhasil', 'Menambahkan Data');


        return redirect()->route('barang.index');




    }

    public function create_new() {
        return view('barang.create-new');
    }

    public function create_old(){
        $barang = Barang::get();
        return view('barang.create-old' , compact('barang'));
    }
         public function create_old_store(Request $request){
             $barang = Barang::findOrFail($request->barang_id);
             $barang->stok += $request->stok;
             $barang->save();
        Alert::success('Success', 'Data Berhasil di tambahkan');
             return redirect(route('barang.index'));


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
            'jurusan' => 'required' ,



        ]);

        $barang = Barang::findOrFail($id);
        $barang->nm_barang = $request->nm_barang;
        $barang->stok = $request->stok;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->kondisi = $request->kondisi;
        $barang->jurusan = $request->jurusan;

        $barang->save();

        return redirect()->route('barang.index')
        ->with('success', 'Data Berhasil Di Edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('barang.index');
    }


    public function tampungan()
    {
        $barang = Barang::all();
        return view('barang.tampungan' , compact('barang'));
    }
    public function hapus($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.tampungan');
    }
    public function barang_dash() {
        $barang = Barang::all();
        return view('home' , compact('barang'));
    }
}

