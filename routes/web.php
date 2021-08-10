<?php

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


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login' , 'AuthController@login');
Route::post('/postlogin' , 'AuthController@postlogin');

Route::get('/dashboard' , 'DashboardController@index')->name('dashboard');

Route::prefix('obat')->group(function() {
    Route::get('/', 'ObatController@index')->name('obat');
    Route::get('create', 'ObatController@create')->name('obat/create');
    Route::post('store', 'ObatController@store')->name('obat/store');
    Route::get('edit/{id}', 'ObatController@edit')->name('obat/edit');
    Route::post('update/{id}', 'ObatController@update')->name('obat/update');
    Route::get('delete/{id}', 'ObatController@destroy')->name('obat/destroy');
});

Route::prefix('apoteker')->group(function() {
    Route::get('/', 'ApotekerController@index')->name('apoteker');
    Route::get('create', 'ApotekerController@create')->name('apoteker/create');
    Route::post('store', 'ApotekerController@store')->name('apoteker/store');
    Route::get('edit/{id}', 'ApotekerController@edit')->name('apoteker/edit');
    Route::post('update/{id}', 'ApotekerController@update')->name('apoteker/update');
    Route::get('delete/{id}', 'ApotekerController@destroy')->name('apoteker/destroy');
});

Route::prefix('transaksi')->group(function() {
    Route::get('/', 'TransaksiController@index')->name('transaksi');
    Route::get('create', 'TransaksiController@create')->name('transaksi/create');
    Route::post('store', 'TransaksiController@store')->name('transaksi/store');
    Route::get('edit/{id}', 'TransaksiController@edit')->name('transaksi/edit');
    Route::post('update/{id}', 'TransaksiController@update')->name('transaksi/update');
    Route::get('delete/{id}', 'TransaksiController@destroy')->name('transaksi/destroy');
});

Route::prefix('laporan')->group(function() {
    Route::get('/', 'LaporanController@index')->name('laporan');
});