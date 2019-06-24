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

// Route::get('/', function () {
//     return view('client.beranda');
// });

// client
Route::get('/', 'ClientBerandaController@beranda')->name('client.beranda');
Route::get('event', 'ClientBerandaController@event')->name('client.event');
Route::get('berita', 'ClientBerandaController@berita')->name('client.berita');
Route::get('sejarah-gereja', function () {return view('client.sejarah');})->name('client.sejarah');
Route::get('sambutan', function () {return view('client.sambutan');})->name('client.sambutan');
Route::get('kontak', function () {return view('client.kontak');})->name('client.kontak');
Route::post('kirim-pesan', 'ClientBerandaController@kirimPesan')->name('client.kirimPesan');
Route::get('event/{slug}', 'ClientBerandaController@singleEvent')->name('client.singleEvent');
Route::get('berita/{slug}', 'ClientBerandaController@singleBerita')->name('client.singleBerita');



