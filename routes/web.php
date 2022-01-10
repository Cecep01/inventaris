<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\BaranngKeluarController;
use App\Http\Controllers\CetakLaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(
    [
        'register' => false
    ]
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'Admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::get('Admin', function () {
        return view('barang.index');
    });
    Route::resource('barang', BarangController::class);

    Route::get('Admin', function () {
        return view('Admin.index');
    });
    Route::resource('peminjam', PeminjamController::class);


    Route::get('Admin', function () {
        return view('home');
    });
    Route::get('Admin', function () {
        return view('barangkeluar.index');
    });
    Route::get('laporan', function () {
        return view('cetak.print.create');
    });
    Route::resource('barangkeluar', BaranngKeluarController::class);
});

Route::get('/cetak-barang', [BarangController::class, 'cetak_barang'])->name('cetak-barang');
Route::get('/cetak/barang', [CetakLaporanController::class, 'create'])->name('cetak-laporan.barang.create');
Route::post('/cetak/barang', [CetakLaporanController::class, 'store'])->name('cetak-laporan');
Route::get('/barang-cetak', [CetakLaporanController::class, 'index'])->name('cetak-laporan.barang.index');
Route::get('/cetak-barangkeluar', [BaranngKeluarController::class, 'cetak_barangkeluar'])->name('cetak-barangkeluar');
Route::get('/cetak-peminjam', [PeminjamController::class, 'cetak_peminjam'])->name('cetak-peminjam');

Route::get('/tampungan', [BarangController::class, 'tampungan'])->name('tampungan');
Route::get('/destroy', [BarangController::class, 'hapus'])->name('destroy');
Route::get('/barangkeluar-card', [BaranngKeluarController::class, 'card'])->name('barangkeluar-card');
Route::get('/peminjam-card', [PeminjamController::class, 'peminjam_card'])->name('peminjam-card');
Route::get('laporan', [CetakLaporanController::class, 'laporanKeluar'])->name('getlaporanKeluar');
Route::post('laporan', [CetakLaporanController::class, 'cetaklaporanKeluar'])->name('laporanKeluar');
