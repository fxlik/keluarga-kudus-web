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
Route::get('berita-mingguan', 'ClientBerandaController@beritaMingguan')->name('client.beritaMingguan');
Route::get('berita-perkawinan', 'ClientBerandaController@beritaKawinan')->name('client.beritaKawinan');
Route::get('sejarah-gereja', function () {return view('client.sejarah');})->name('client.sejarah');
Route::get('sambutan', function () {return view('client.sambutan');})->name('client.sambutan');
Route::get('kontak', function () {return view('client.kontak');})->name('client.kontak');
Route::get('pelayan', function () {return view('client.pelayan');})->name('client.pelayan');
Route::post('kirim-pesan', 'ClientBerandaController@kirimPesan')->name('client.kirimPesan');
Route::get('event/{slug}', 'ClientBerandaController@singleEvent')->name('client.singleEvent');
Route::get('berita/{slug}', 'ClientBerandaController@singleBerita')->name('client.singleBerita');

// admin
Route::get('pengurus/login', 'PengurusController@halaman_login_operator')->name('pengurus.login');
Route::post('pengurus/loginOperator', 'PengurusController@proses_login_operator')->name('pengurus.prosesLogin');
Route::get('pengurus/logoutOperator', 'PengurusController@logoutOperator')->name('pengurus.prosesLogout');

Route::group(['prefix' => 'pengurus', 'middleware' => ['auth.basic', 'auth.admin']], function() {
    Route::get('/beranda', 'PengurusBerandaController@beranda')->name('pengurus.beranda');
    Route::get('/pesan', 'PengurusBerandaController@tampilPesan')->name('pengurus.pesan');
    Route::get('pesan/delete/{id}', 'PengurusBerandaController@hapusPesan')->name('pengurus.pesanDelete');
    // kelola berita
    Route::get('/berita', 'PengurusBerandaController@tampilBerita')->name('pengurus.berita');
    Route::get('/berita/create', 'PengurusBerandaController@createBerita')->name('pengurus.beritaCreate');
    Route::post('berita/create/post', 'PengurusBerandaController@postBerita')->name('pengurus.beritaPost');
    Route::get('berita/edit/{id}', 'PengurusBerandaController@editBerita')->name('pengurus.beritaEdit');
    Route::get('berita/delete/{id}', 'PengurusBerandaController@deleteBerita')->name('pengurus.beritaDelete');
    Route::post('berita/update', 'PengurusBerandaController@updateBerita')->name('pengurus.beritaUpdate');
    
    // kelola event
    Route::get('/event', 'PengurusBerandaController@tampilEvent')->name('pengurus.event');
    Route::get('/event/create', 'PengurusBerandaController@createEvent')->name('pengurus.eventCreate');
    Route::get('event/edit/{id}', 'PengurusBerandaController@editEvent')->name('pengurus.eventEdit');
    Route::get('event/delete/{id}', 'PengurusBerandaController@deleteEvent')->name('pengurus.eventDelete');
    Route::post('event/create/post', 'PengurusBerandaController@postEvent')->name('pengurus.eventPost');
    Route::post('event/update', 'PengurusBerandaController@updateEvent')->name('pengurus.eventUpdate');

    // tampilan
    Route::get('sejarah', 'PengurusTampilanController@editSejarah')->name('pengurus.sejarahEdit');
    Route::get('sejarah/edit', 'PengurusTampilanController@updateSejarah')->name('pengurus.sejarahUpdate');
    Route::post('sejarah/post', 'PengurusTampilanController@postSejarah')->name('pengurus.sejarahPost');
    // ssambutan
    Route::get('sambutan', 'PengurusTampilanController@sambutan')->name('pengurus.sambutan');
    Route::get('sambutan/edit', 'PengurusTampilanController@editSambutan')->name('pengurus.sambutanEdit');
    Route::post('sambutan/post', 'PengurusTampilanController@updateSambutan')->name('pengurus.sambutanUpdate');

    Route::get('tampilan-umum', 'PengurusTampilanController@tampilanUmum')->name('pengurus.tampilanUmum');
    Route::get('tampilan-umum/edit', 'PengurusTampilanController@editTampilanUmum')->name('pengurus.editTampilanUmum');
    Route::post('tampilan-umum/update', 'PengurusTampilanController@updateTampilanUmum')->name('pengurus.updateTampilanUmum');
    Route::get('slider', 'PengurusTampilanController@slider')->name('pengurus.slider');
    Route::get('slider/create', 'PengurusTampilanController@sliderCreate')->name('pengurus.sliderCreate');
    Route::post('slider/post', 'PengurusTampilanController@sliderPost')->name('pengurus.sliderPost');
    Route::get('slider/edit/{slider_id}', 'PengurusTampilanController@sliderEdit')->name('pengurus.sliderEdit');
    Route::post('slider/update', 'PengurusTampilanController@sliderUpdate')->name('pengurus.sliderUpdate');
    Route::get('slider/delete/{id}', 'PengurusTampilanController@sliderDelete')->name('pengurus.sliderDelete');

    Route::get('/organisasi', 'PengurusBerandaController@tampilOrganisasi')->name('pengurus.organisasi');

    Route::get('galeri', 'PengurusTampilanController@galeri')->name('pengurus.galeri');
    Route::get('galeri/create', 'PengurusTampilanController@galeriCreate')->name('pengurus.galeriCreate');
    Route::post('galeri/post', 'PengurusTampilanController@galeriPost')->name('pengurus.galeriPost');
    Route::get('galeri/delete/{id}', 'PengurusTampilanController@galeriDelete')->name('pengurus.galeriDelete');
});

// Route::get('pengurus/beranda', function(){
//     return view('admin.beranda');
// });



