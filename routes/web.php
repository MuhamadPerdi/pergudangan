<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::resource('barang', AdminController::class)->names('admin.barang');
    Route::resource('suplier', SuplierController::class)->names('admin.suplier');
    
});

Route::get('/gudang', [AdminController::class, 'gudang'])->name('gudang.index');
