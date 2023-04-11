<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/form/transaksi', function () {
    return view('form/transaksiForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Transaksi"
    ]);
});

Route::get('/form/stokKain', function () {
    return view('form/stok_kainForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Stok Kain"
    ]);
});

Route::get('/form/roll', function () {
    return view('form/rollForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Roll"
    ]);
});

Route::get('/form/kain', function () {
    return view('form/kainForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Kain"
    ]);
});

Route::get('/form/produksi', function () {
    return view('form/produksiForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Produksi"
    ]);
});

Route::get('/form/stokKertas', function () {
    return view('form/stok_kertasForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Stok Kertas"
    ]);
});

Route::get('/form/kertas', function () {
    return view('form/kertasForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Kertas"
    ]);
});

Route::get('/form/berat', function () {
    return view('form/beratForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Berat"
    ]);
});

Route::get('/form/tinta', function () {
    return view('form/tintaForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Tinta"
    ]);
});

Route::get('/form/volume', function () {
    return view('form/volumeForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Volume"
    ]);
});

Route::get('/form/warna', function () {
    return view('form/warnaForm', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Form Warna"
    ]);
});
// TABLE
Route::get('/table/transaksi', function () {
    return view('table/transaksi', [
        "user1" => "Admin",
        "user2" => "Karyawan",
        "title" => "Tabel Transaksi"
    ]);
});

Route::get('/table/stokKain', function () {
    return 'Halaman Tabel Stok Kain';
});

Route::get('/table/roll', function () {
    return 'Halaman Tabel Roll';
});

Route::get('/table/kain', function () {
    return 'Halaman Tabel Kain';
});

Route::get('/table/produksi', function () {
    return 'Halaman Tabel Produksi';
});

Route::get('/table/stokKertas', function () {
    return 'Halaman Tabel Stok Kertas';
});

Route::get('/table/kertas', function () {
    return 'Halaman Tabel Kertas';
});

Route::get('/table/berat', function () {
    return 'Halaman Tabel Berat';
});

Route::get('/table/tinta', function () {
    return 'Halaman Tabel Tinta';
});

Route::get('/table/volume', function () {
    return 'Halaman Tabel Volume';
});

Route::get('/table/warna', function () {
    return 'Halaman Tabel Warna';
});
