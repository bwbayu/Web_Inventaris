<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;

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
Route::get('/form/{slug}', [FormController::class, 'show']);

// TABLE
Route::get('/table/{link}', [TableController::class, 'show']);
