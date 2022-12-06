<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\LoginController;

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


// {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/konsumen/add', [KonsumenController::class, 'create'])->name('konsumen.create')->middleware('auth');
Route::post('/konsumen/store', [KonsumenController::class, 'store'])->name('konsumen.store');
Route::get('/konsumen', [KonsumenController::class, 'index'])->name('konsumen.index')->middleware('auth')->middleware('auth');
Route::get('/konsumen/edit/{id}', [KonsumenController::class, 'edit'])->name('konsumen.edit')->middleware('auth');
Route::post('/konsumen/update/{id}', [KonsumenController::class,'update'])->name('konsumen.update');
Route::get('/konsumen/search', [KonsumenController::class, 'search'])->name('konsumen.search')->middleware('auth');
Route::post('/konsumen/delete/{id}', [KonsumenController::class,'delete'])->name('konsumen.delete');
Route::post('/konsumen/hide/{id}', [KonsumenController::class, 'hide'])->name('konsumen.hide');
Route::get('/konsumen/trash', [KonsumenController::class, 'trash'])->name('konsumen.trash')->middleware('auth');
Route::get('/konsumen/restore/{id}', [KonsumenController::class, 'restore'])->name('konsumen.restore')->middleware('auth');
Route::get('/konsumen/search/trash', [KonsumenController::class, 'search_trash'])->name('konsumen.search_trash')->middleware('auth');

Route::get('/service/add', [ServiceController::class, 'create'])->name('service.create')->middleware('auth');
Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index')->middleware('auth');
Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit')->middleware('auth');
Route::post('/service/update/{id}', [ServiceController::class,'update'])->name('service.update');
Route::post('/service/delete/{id}', [ServiceController::class,'delete'])->name('service.delete');
Route::get('/service/search', [ServiceController::class, 'search'])->name('service.search')->middleware('auth');
Route::post('/service/hide/{id}', [ServiceController::class, 'hide'])->name('service.hide');
Route::get('/service/trash', [ServiceController::class, 'trash'])->name('service.trash')->middleware('auth');
Route::get('/service/restore/{id}', [ServiceController::class, 'restore'])->name('service.restore')->middleware('auth');
Route::get('/service/search/trash', [ServiceController::class, 'search_trash'])->name('service.search_trash')->middleware('auth');

Route::get('/pembayaran/add', [PembayaranController::class, 'create'])->name('pembayaran.create')->middleware('auth');
Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index')->middleware('auth');
Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit'])->name('pembayaran.edit')->middleware('auth');
Route::post('/pembayaran/update/{id}', [PembayaranController::class,'update'])->name('pembayaran.update');
Route::post('/pembayaran/delete/{id}', [PembayaranController::class,'delete'])->name('pembayaran.delete');
Route::get('/pembayaran/search', [PembayaranController::class, 'search'])->name('pembayaran.search')->middleware('auth');
Route::post('/pembayaran/hide/{id}', [PembayaranController::class, 'hide'])->name('pembayaran.hide');
Route::get('/pembayaran/trash', [PembayaranController::class, 'trash'])->name('pembayaran.trash')->middleware('auth');
Route::get('/pembayaran/restore/{id}', [PembayaranController::class, 'restore'])->name('pembayaran.restore')->middleware('auth');
Route::get('/pembayaran/search/trash', [PembayaranController::class, 'search_trash'])->name('pembayaran.search_trash')->middleware('auth');

Route::get('/sparepart/add', [SparepartController::class, 'create'])->name('sparepart.create')->middleware('auth');
Route::post('/sparepart/store', [SparepartController::class, 'store'])->name('sparepart.store');
Route::get('/sparepart', [SparepartController::class, 'index'])->name('sparepart.index')->middleware('auth');
Route::get('/sparepart/edit/{id}', [SparepartController::class, 'edit'])->name('sparepart.edit')->middleware('auth');
Route::post('/sparepart/update/{id}', [SparepartController::class,'update'])->name('sparepart.update');
Route::post('/sparepart/delete/{id}', [SparepartController::class,'delete'])->name('sparepart.delete');
Route::get('/sparepart/search', [SparepartController::class, 'search'])->name('sparepart.search')->middleware('auth');
Route::post('/sparepart/hide/{id}', [SparepartController::class, 'hide'])->name('sparepart.hide');
Route::get('/sparepart/trash', [SparepartController::class, 'trash'])->name('sparepart.trash')->middleware('auth');
Route::get('/sparepart/restore/{id}', [SparepartController::class, 'restore'])->name('sparepart.restore')->middleware('auth');
Route::get('/sparepart/search/trash', [SparepartController::class, 'search_trash'])->name('sparepart.search_trash')->middleware('auth');