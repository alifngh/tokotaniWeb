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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produk', 'ProdukController@index')->name('produk');
Route::get('/produk/delete/{id}', 'ProdukController@deleteProduk')->name('delete');
Route::get('/tambah', 'ProdukController@toTambahProduk')->name('totambahProduk');

Route::post('/tambah', 'ProdukController@tambahProduk')->name('tambahProduk');
