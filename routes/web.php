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
Route::get('pelayan', 'ClientBerandaController@pelayananWilayah')->name('client.pelayan');
Route::post('kirim-pesan', 'ClientBerandaController@kirimPesan')->name('client.kirimPesan');
Route::get('event/{slug}', 'ClientBerandaController@singleEvent')->name('client.singleEvent');
Route::get('berita/{slug}', 'ClientBerandaController@singleBerita')->name('client.singleBerita');
Route::get('organisasi', 'ClientBerandaController@organisasi')->name('client.organisasi');

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
    Route::post('berita/publish', 'PengurusBerandaController@publishBerita')->name('pengurus.beritaPublish');
    // kelola event
    Route::get('/event', 'PengurusBerandaController@tampilEvent')->name('pengurus.event');
    Route::get('/event/create', 'PengurusBerandaController@createEvent')->name('pengurus.eventCreate');
    Route::get('event/edit/{id}', 'PengurusBerandaController@editEvent')->name('pengurus.eventEdit');
    Route::get('event/delete/{id}', 'PengurusBerandaController@deleteEvent')->name('pengurus.eventDelete');
    Route::post('event/create/post', 'PengurusBerandaController@postEvent')->name('pengurus.eventPost');
    Route::post('event/update', 'PengurusBerandaController@updateEvent')->name('pengurus.eventUpdate');
    Route::post('event/publish', 'PengurusBerandaController@validasiEvent')->name('pengurus.eventPublish');

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

    
    Route::get('galeri', 'PengurusTampilanController@galeri')->name('pengurus.galeri');
    Route::get('galeri/create', 'PengurusTampilanController@galeriCreate')->name('pengurus.galeriCreate');
    Route::post('galeri/post', 'PengurusTampilanController@galeriPost')->name('pengurus.galeriPost');
    Route::get('galeri/delete/{id}', 'PengurusTampilanController@galeriDelete')->name('pengurus.galeriDelete');
    
    // kelola wilayah
    Route::get('wilayah', 'PengurusWilayahController@wilayah')->name('pengurus.wilayah');
    Route::post('wilayah/post', 'PengurusWilayahController@wilayahPost')->name('pengurus.wilayahPost');
    Route::get('wilayah/delete/{id}', 'PengurusWilayahController@wilayahDelete')->name('pengurus.wilayahDelete');
    Route::post('wilayah/update', 'PengurusWilayahController@wilayahUpdate')->name('pengurus.wilayahUpdate');
    Route::get('wilayah/{wilayah_id}', 'PengurusWilayahController@wilayahKelola')->name('pengurus.wilayahKelola');
    
    Route::post('wilayah/lingkungan/post', 'PengurusWilayahController@lingkunganPost')->name('pengurus.lingkunganPost');
    Route::get('wilayah/lingkungan/delete/{id}', 'PengurusWilayahController@lingkunganDelete')->name('pengurus.lingkunganDelete');
    Route::post('wilayah/lingkungan/update', 'PengurusWilayahController@lingkunganUpdate')->name('pengurus.lingkunganUpdate');
    
    Route::get('/organisasi', 'PengurusOrganisasiController@organisasi')->name('pengurus.organisasi');
    Route::post('organisasi/post', 'PengurusOrganisasiController@organisasiPost')->name('pengurus.organisasiPost');
    Route::get('organisasi/delete/{id}', 'PengurusOrganisasiController@organisasiDelete')->name('pengurus.organisasiDelete');
    Route::post('organisasi/update', 'PengurusOrganisasiController@organisasiUpdate')->name('pengurus.organisasiUpdate');
    Route::get('organisasi/{organisasi_id}', 'PengurusOrganisasiController@organisasiDetail')->name('pengurus.organisasiDetail');
    Route::post('organisasi/seksi/post', 'PengurusOrganisasiController@seksiPost')->name('pengurus.seksiPost');
    Route::get('organisasi/seksi/delete/{id}', 'PengurusOrganisasiController@seksiDelete')->name('pengurus.seksiDelete');
    Route::post('organisasi/seksi/update', 'PengurusOrganisasiController@seksiUpdate')->name('pengurus.seksiUpdate');
    Route::get('organisasi/pelayanan/{organisasi_id}', 'PengurusOrganisasiController@pelayananOrganisasi')->name('pengurus.pelayananOrganisasi');
    Route::get('validasi-usulan', 'PengurusWilayahController@validasiUsulan')->name('pengurus.validasiUsulan');
    Route::post('validasi-usulan/post', 'PengurusWilayahController@postValidasiUsulan')->name('pengurus.validasiUsulanPost');

    // pengurus wilayah move move
    // Route::get('home', 'PwController@beranda')->name('pw.beranda');
    Route::get('usulan-pelayanan', 'PwController@usulan')->name('pw.usulan');
    Route::get('usulan-pelayanan/create', 'PwController@usulanCreate')->name('pw.usulanCreate');
    Route::get('json-seksi', 'PwController@jsonSeksi')->name('pw.jsonSeksi');
    Route::post('usulan-pelayan/post', 'PwController@usulanPost')->name('pw.usulanPost');
    Route::get('usulan-pelayanan/delete/{id}', 'PwController@usulanDelete')->name('pw.usulanDelete');
});

// Route::group(['prefix' => 'pengurus', 'middleware' => ['auth.basic', 'auth.pw']], function() {
    
// });

// Route::get('pengurus/beranda', function(){
//     return view('admin.beranda');
// });



