<?php

use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\ReportController;
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
    return view('welcome');
});

Auth::routes();
Route::resource('/barang', BarangController::class);
// Route::get('transaksi/export', [TransaksiController::class, 'export']);
Route::resource('/transaksi', TransaksiController::class);
Route::post('/report/transaksi', [ReportController::class, 'index'])->name('report.transaksi');
Route::get('/report/excel', [ReportController::class, 'export'])->name('report.excel');
Route::resource('/report', ReportController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
