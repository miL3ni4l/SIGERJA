<?php

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
/*
Route::get('/', function () {
    return view('home');
});
*/
Auth::routes();
// Route::get('/Register', function(){
//     return view('auth.register');
//     });

// !@rogUGErj^iOMY^sA3d
Route::get('/home', 'HomeController@index')->name('home');  
Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');

Route::resource('user', 'UserController');
Route::resource('anggota', 'AnggotaController');
Route::resource('gerwil', 'GerwilController');
Route::resource('talenta', 'TalentaController');
Route::resource('nikah', 'NikahController');
Route::resource('jabatan', 'JabatanController');

Route::resource('export', 'ExportController');
Route::resource('acara', 'AcaraController');
Route::resource('bank', 'BankController');
Route::get('/format_acara', 'AcaraController@format');
Route::post('/import_acara', 'AcaraController@import');

Route::resource('list', 'ListController');

Route::resource('transaksi', 'TransaksiController');

Route::resource('transnikah', 'TransNikahController');


Route::resource('transaksi1', 'TransaksiController');
Route::get('/laporan/gwl', 'LaporanController@gerwil');
Route::get('/laporan/gwl/pdf', 'LaporanController@gerwilPdf');
Route::get('/laporan/agt', 'LaporanController@anggota');
Route::get('/laporan/agt/pdf', 'LaporanController@anggotaPdf');
Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');

Route::get('/laporan/acara', 'LaporanController@acara');
Route::get('/laporan/acara/pdf', 'LaporanController@acaraPdf');
Route::get('/laporan/acara/excel', 'LaporanController@acaraExcel');


