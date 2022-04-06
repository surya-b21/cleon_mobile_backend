<?php

use App\Http\Controllers\admin\DashboardController;
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
    Route::prefix('pengguna')->as('pengguna.')->group(function(){
        Route::resource('/', PenggunaController::class)->except('show');
    });
    Route::prefix('transaksi')->as('transaksi.')->group(function(){
        Route::resource('/', TransaksiController::class)->except('show');
    });
});

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
