<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

/* Resource Barang untuk akses semuanya */
Route::resource('barang', BarangController::class)->middleware(['auth']);
/* Resource Karyawan untuk akses semuanya */
Route::resource('karyawan', KaryawanController::class)->middleware(['auth']);
/* Resource Jabatan untuk akses semuanya */
Route::resource('jabatan', JabatanController::class)->middleware(['auth']);
/* Resource Gol untuk akses semuanya */
Route::resource('gol', GolController::class)->middleware(['auth']);
/* Resource Order untuk akses semuanya */
Route::resource('order', OrderController::class)->middleware(['auth']);
/* Resource Stat untuk akses semuanya */
Route::resource('status', StatusController::class)->middleware(['auth']);
/* Resource Dashboard untuk akses semuanya */
Route::resource('dashboard', DashboardController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
