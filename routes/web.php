<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TintaController;
use App\Http\Controllers\StokKainController;
use App\Http\Controllers\StokTintaController;
use App\Http\Controllers\StokKertasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RollController;

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
    return view('/page/home');
});

Route::get('/login', function () {
    return 'halaman login';
});

Route::get('/dashboard', function () {
    return view('/page/dashboard', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Dashboard"
    ]);
});

Route::get('/riwayatMasuk', function () {
    return 'Halaman riwayat barang masuk';
});

Route::get('/riwayatKeluar', function () {
    return 'Halaman riwayat barang keluar';
});

// FORM
Route::get('/form/{slug}', [FormController::class, 'index']);
Route::get('/get-rolls/{idStokKain}', [RollController::class, 'getRolls']);
Route::get('/get-panjang', [StokKertasController::class, 'getPanjang']);

// TABLE
Route::get('/table/{link}', [TableController::class, 'show']);

// POST
Route::post('/form/Stok_Kain', [StokKainController::class, 'store'])->name('stok_kain.store');
Route::post('/form/Stok_Kertas', [StokKertasController::class, 'store'])->name('stok_kertas.store');
Route::post('/form/Stok_Tinta', [StokTintaController::class, 'store'])->name('stok_tinta.store');
Route::post('/form/Tinta', [TintaController::class, 'store'])->name('tinta.store');
Route::post('/form/Transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
