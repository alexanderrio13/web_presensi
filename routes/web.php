<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('Login.Login-aplikasi');
});



route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');
route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
route::get('forgot-password/{token}', [LoginController::class, 'forgotPasswordValidate']);
route::post('forgot-password', [LoginController::class, 'resetPassword'])->name('forgot-password');
route::put('reset-password', [LoginController::class, 'updatePassword'])->name('reset-password');


Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::get('/home/',[HomeController::class,'index'])->name('dashboard-karyawan');
    route::post('/home/update',[HomeController::class,'updateAccount']);
    route::post('/home/update/note',[HomeController::class,'updateNote']);
    route::post('/home', 'HomeController@reportStore');
    route::put('/home/report/edit/{Report}', 'HomeController@reportEdit');
    route::get('/home/report/hapus/{id}', 'HomeController@reportDestroy');
});
Route::group(['middleware' => ['auth','ceklevel:administrator']], function () {
    route::get('/admin-dashboard',[HomeController::class,'adminIndex'])->name('dashboard-admin');
    Route::get('/karyawan/tambah/',[HomeController::class,'tambah']);
    Route::post('/karyawan/store',[HomeController::class,'store']);
    Route::get('/karyawan/edit/{id}',[HomeController::class,'edit']);
    Route::post('/karyawan/update',[HomeController::class,'update']);
    Route::get('/karyawan/hapus/{id}',[HomeController::class,'hapus']);
});


Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/laman-presensi',[PresensiController::class,'index'])->name('laman-presensi');
    route::get('/laman-presensi/masuk',[PresensiController::class,'masuk'])->name('presensi-masuk');
    route::get('/laman-presensi/keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
    Route::get('/lembur/tambah/',[PresensiController::class,'lembur'])->name('form-lembur');
    Route::post('/lembur/store',[PresensiController::class,'lemburstore'])->name('simpan-lembur');
});
Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data');
Route::post('filter-data/result',[PresensiController::class,'rekapresult'])->name('filter-result');
Route::get('filter-data/all',[PresensiController::class,'halamanrekapAll'])->name('filter-data-all');
Route::post('filter-data/all/result',[PresensiController::class,'rekapresultAll'])->name('filter-result-all');
// Route::get('filter-data/{tglawal}/{tglakhir}/{user_id}',[PresensiController::class,'rekapresult'])->name('filter-result');
Route::get('history',[PresensiController::class,'history'])->name('history');
Route::get('rekap-lembur',[PresensiController::class,'rekaplembur'])->name('rekap-lembur');
