<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $visible = ['nm_peminjam' , 'jk' , 'status' , 'jurusan' , 'no_tlp' , 'jumlah' , 'tgl_pinjam' , 'tgl_kembali' , 'jumlah' , 'barang_id'];
    protected $fillable = ['nm_peminjam' , 'jk' , 'status' , 'jurusan' , 'no_tlp' , 'jumlah' , 'tgl_pinjam' , 'tgl_kembali' , 'jumlah' , 'barang_id'];
    public $timestamps = true;
    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id');
}
}
