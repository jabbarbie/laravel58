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

Auth::routes(['register' => false]);

// Dashboard
Route::get('/', 'dashboardController@index')->middleware('auth');
// Sepatu
Route::resource('sepatu', 'sepatuController')->middleware('auth');
// Pelanggan
Route::resource('pelanggan', 'pelangganController')->middleware('auth');
// Penjualan
Route::resource('penjualan', 'penjualanController')->middleware('auth');
// DetailPenjualan
Route::resource('detail', 'detailController')->middleware('auth');
// USer
Route::resource('users', 'usersController')->middleware('auth');


