<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisPaketController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\TransaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get10transaksi', [DashboardController::class, 'get10Transaksi'])->name('get10transaksi');
    Route::get('/get10user', [DashboardController::class, 'get10user'])->name('get10user');
    Route::prefix('pengguna')->as('pengguna.')->group(function () {
        Route::resource('', PenggunaController::class)->only(['index', 'store']);
        Route::post('/{id}/update', [PenggunaController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [PenggunaController::class, 'destroy'])->name('destroy');
        Route::get('/getuser', [PenggunaController::class, 'getuser'])->name('getuser');
        Route::post('getupdate', [PenggunaController::class, 'getupdate'])->name('getupdate');
    });
    Route::prefix('transaksi')->as('transaksi.')->group(function () {
        Route::resource('/', TransaksiController::class)->only('index');
        Route::get('/gettransaksi', [TransaksiController::class, 'gettransaksi'])->name('gettransaksi');
        Route::get('/export', [TransaksiController::class, 'export'])->name('export');
        Route::get('/export-bulan/{bulan}', [TransaksiController::class, 'exportbybulan']);
        Route::get('/export-paket/{paket}', [TransaksiController::class, 'exportbypaket']);
    });
    Route::prefix('paket')->as('paket.')->group(function () {
        Route::resource('/', PaketController::class)->only(['index', 'store']);
        Route::post('/{id}/update', [PaketController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [PaketController::class, 'destroy'])->name('destroy');
        Route::resource('/jenis-paket', JenisPaketController::class)->except(['index', 'show', 'edit', 'create', 'destroy']);
        Route::get('/jenis-paket/{id}/destroy', [JenisPaketController::class, 'destroy'])->name("jenis-paket.destroy");
        Route::get('/getpaket', [PaketController::class, 'getpaket'])->name('getpaket');
        Route::post('/getupdate', [PaketController::class, 'getupdate'])->name('getupdate');
        Route::get('/getjenispaket', [JenisPaketController::class, 'getjenispaket'])->name('getjenispaket');
        Route::post('/jenis-paket/getupdate', [JenisPaketController::class, 'getupdate'])->name('jenis-paket.getupdate');
    });
});

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
