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
// Dashboard
Route::get('/', 'dashboardController@index');
// Sepatu
Route::resource('sepatu', 'sepatuController');
// Pelanggan
Route::resource('pelanggan', 'pelangganController');
// Penjualan
Route::resource('penjualan', 'penjualanController');
// DetailPenjualan
Route::resource('detail', 'detailController');
