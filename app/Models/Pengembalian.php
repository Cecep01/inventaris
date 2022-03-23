<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    public function barang () {
        return $this->belongsTo(Barang::class);

    }
    public function peminjam() {
        return $this->belongsTo(Peminjam::class);

    }
}
