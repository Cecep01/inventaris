<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaranngKeluar extends Model
{
    use HasFactory;
    protected $visible = ['jumlah' , 'tgl_keluar' , 'kondisi', 'jurusan' , 'barang_id'];
    protected $fillable = ['jumlah' , 'tgl_keluar' , 'kondisi', 'jurusan' , 'barang_id'];
    public $timestamps = true;

    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
