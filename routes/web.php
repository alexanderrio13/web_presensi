<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;



Route::get('/', function () {
    return view('Login.Login-aplikasi');
});


route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::get('/home',[HomeController::class,'index'])->name('dashboard-karyawan');
});
Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    route::get('/admin-dashboard',[HomeController::class,'adminIndex'])->name('dashboard-admin');
    Route::get('/karyawan/hapus/{id}',[HomeController::class,'hapus']);
});


Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/laman-presensi',[PresensiController::class,'index'])->name('laman-presensi');
    route::get('/laman-presensi/masuk',[PresensiController::class,'masuk'])->name('presensi-masuk');
    route::get('/laman-presensi/keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
});
Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data');
Route::post('filter-data/result',[PresensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan');
// Route::get('filter-data/{tglawal}/{tglakhir}/{user_id}',[PresensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan');
Route::get('filter-data-karyawan',[PresensiController::class,'tampildataperkaryawan'])->name('filter-data-karyawan');
