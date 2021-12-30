<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $visible = ['nm_barang' , 'stok' , 'tgl_masuk' , 'kondisi' , 'status' , 'jurusan'];
    protected $fillable = ['nm_barang' , 'stok' , 'tgl_masuk' , 'kondisi' , 'status' ,'jurusah'];
    //mencatat waktu
    public $timestamps = true ;

    public function Peminjaman() {
        // untuk berelasi
        return $this->hasMany(Peminjam::class ,'barang_id');
    }
    public function BarangKeluar(){
        return $this->hasMany(BaranngKeluar::class ,'barang_id');
    }
}
