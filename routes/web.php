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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'master', 'middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('user', 'AkunController');
    Route::resource('barang', 'BarangController');
    Route::resource('transaksi', 'TransaksiController');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});