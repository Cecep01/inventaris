<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\BaranngKeluarController;

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

Route::group(['prefix' => 'Admin', 'middleware' => ['auth', 'role:Admin']], function (){
    Route::get('Admin', function() {
        return view('barang.index');
    });
    Route::resource('barang', BarangController::class);

    Route::get('Admin', function() {
        return view('Admin.index');
    });
    Route::resource('peminjam', PeminjamController::class);


    Route::get('Admin', function() {
        return view('home');
    });
    Route::get('Admin' , function(){
        return view('barangkeluar.index');
    });
    Route::resource('barangkeluar' , BaranngKeluarController::class);
    
});