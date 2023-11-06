<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\BarangController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function (){
    return view('index');
});

Route::get('kurir', [KurirController::class, 'index']);
Route::post('kurir', [KurirController::class, 'store']);
Route::get('kurir/delete/{id}', [KurirController::class, 'destroy']);
Route::get('kurir/edit/{id}', [KurirController::class, 'edit']);
Route::post('kurir/edit/{id}', [KurirController::class, 'update']);

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang', [BarangController::class, 'store']);
Route::get('barang/delete/{id}', [BarangController::class, 'destroy']);
Route::get('barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('barang/edit/{id}', [BarangController::class, 'update']);
