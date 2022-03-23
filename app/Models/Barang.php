<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Barang extends Model
{
    use HasFactory;
    protected $visible = ['nm_barang', 'stok', 'tgl_masuk', 'kondisi', 'jurusan', 'gambar'];
    protected $fillable = ['nm_barang', 'stok', 'tgl_masuk', 'kondisi', 'jurusah', 'gambar'];
    //mencatat waktu
    public $timestamps = true;

    public function Peminjaman()
    {
        // untuk berelasi
        return $this->hasMany(Peminjam::class, 'barang_id');
    }
    public function BarangKeluar()
    {
        return $this->hasMany(BaranngKeluar::class, 'barang_id');
    }
    public static function boot()
    {
        parent::boot();  
        self::deleting(
            function ($parent) {
                if ($parent->BarangKeluar->count() > 0) {
                    Alert::error('Failed', 'Data not d eleted');
                    return false;
                } else if ($parent->Peminjaman->count() > 0) {
                    Alert::error('Failed', 'Data not deleted');
                    return false;
                }
            }
        );
    }
}
