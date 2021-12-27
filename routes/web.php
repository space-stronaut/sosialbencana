<?php

use App\Http\Controllers\BencanaController;
use App\Http\Controllers\KategoriBencanaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:masyarakat']], function () {
    Route::get('/masyarakat', function(){
        return 'masyarakat';
    });
});

Route::group(['middleware' => ['can:master']], function () {
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('kategori', KategoriBencanaController::class);
    Route::resource('bencana', BencanaController::class);
    Route::resource('user', UserController::class);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
});

Route::resource('laporan', LaporanController::class);
Route::post('/laporan/validasi/{id}', [LaporanController::class, 'validasi'])->name('laporan.validasi');
Route::post('/laporan/korban', [LaporanController::class, 'addKorban'])->name('laporan.addKorban');
Route::delete('/laporan/korban/hapus/{id}', [LaporanController::class, 'deleteKorban'])->name('laporan.deleteKorban');
