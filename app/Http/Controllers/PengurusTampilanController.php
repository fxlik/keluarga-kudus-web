<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sejarah;
use App\Sambutan;
use App\Slider;
use App\Tampilan;
use App\Galeri;
use File;

class PengurusTampilanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function editSejarah(){
        $sejarah = Sejarah::first();
        return view('admin.sejarah', compact('sejarah'));
    }
    
    public function updateSejarah(){
        $sejarah = Sejarah::first();
        return view('admin.sejarah-edit', compact('sejarah'));
    }

    public function postSejarah(Request $request){
        $sejarahin = Sejarah::first();
        $isi = $request->sejara;
        $sejarahin->update([
            'sejarah' => $isi,
            // 'slug' => $sejarah->slug
        ]);
        // return back();
        return redirect()->route('pengurus.sejarahEdit');
    }

    public function sambutan(){
        $sambutan = Sambutan::first();
        return view('admin.sambutan', compact('sambutan'));
    }

    public function editSambutan(){
        $sambutan = Sambutan::first();
        return view('admin.sambutan-edit', compact('sambutan'));
    }

    public function updateSambutan(Request $request){
        $sambutin = Sambutan::first();
        $isi = $request->sambutaja;
        $sambutin->update([
           'sambutan' => $isi,
        ]);
        return redirect()->route('pengurus.sambutan');
    }

    public function tampilanUmum(){
        $tampilan = Tampilan::first();
        return view('admin.tampilan-umum', compact('tampilan'));
    }

    public function editTampilanUmum(){
        $tampilin = Tampilan::first();
        return view('admin.ubah-tampilan-umum', compact('tampilin'));
    }

    public function updateTampilanUmum(Request $request){
        $tampilan = Tampilan::first();

        if ($request->hasFile('logo1')){
            $file = $request->file('logo1');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('logo1'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/core-img'), $namafile);
            $logo1 = $namafile;
        }else{
            $logo1 = $tampilan->logo1;
        }

        if ($request->hasFile('logo2')){
            $file2 = $request->file('logo2');
            $ext2 = $file2->getClientOriginalExtension();
            $namafile2 = str_slug('logo2'.'-'.time().'-'.rand(10,100)).'.'.$ext2;
            $file2->move(public_path('client/img/core-img'), $namafile2);
            $logo2 = $namafile2;
        }else{
            $logo2 = $tampilan->logo2;
        }

        $site_title = $request->site_title;
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $email = $request->email;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $jadwal_ibadah = $request->jadwal_ibadah;

        $tampilan->update([
            'logo1' => $logo1,
            'logo2' => $logo2,
            'site_title' => $site_title,
            'site_keyword' => $site_title,
            'site_desc' => $site_title,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'email' => $email,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'jadwal_ibadah' => $jadwal_ibadah
        ]);
        return redirect()->route('pengurus.tampilanUmum');

    }

    public function slider(){
        $slider = Slider::orderBy('id')->get();
        $jumlahSlider = count($slider);
        return view('admin.slider', compact('slider', 'jumlahSlider'));
    }

    public function sliderEdit($slider_id){
        $sliderEdit = Slider::find($slider_id);
        return view('admin.ubah-slider', compact('sliderEdit', 'slider_id'));
    }

    public function sliderCreate(){
        return view('admin.tambah-slider');
    }

    public function sliderPost(Request $request){
        $sliderPost = new Slider;

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('slider'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $sliderPost->foto = $namafile;
        }
        $sliderPost->judul = $request->judul;
        $sliderPost->deskripsi = $request->deskripsi;
        $sliderPost->save();
        return redirect()->route('pengurus.slider');

    }

    public function sliderDelete($id){
        $cishani = Slider::find($id);
        $foto_cishani = public_path('client/img/bg-img/'.$cishani->foto);
        // return $foto_cishani;
        File::delete($foto_cishani);
        $sliderDelete = Slider::findOrFail($id)->delete();
        return back();
    }

    public function sliderUpdate(Request $request){
        $sliderUpdate = Slider::findOrFail($request->slider_id);

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('slider'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $foto = $namafile;
        }else{
            $foto = $sliderUpdate->foto;
        }

        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $sliderUpdate->update([
            'foto' => $foto,
            'judul' => $judul,
            'deskripsi' => $deskripsi
        ]);
        return redirect()->route('pengurus.slider');
    }

    // kelola galeri
    public function galeri(){
        $galeri = Galeri::orderBy('id', 'DESC')->get();
        $hitungGaleri = count($galeri); 
        return view('admin.galeri', compact('galeri', 'hitungGaleri'));
    }

    public function galeriCreate(){
        return view('admin.tambah-galeri');
    }

    public function galeriPost(Request $request){
        $galeriPost = new Galeri;

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('foto-galeri'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $galeriPost->foto = $namafile;
        }
        $galeriPost->caption = $request->caption;
        $galeriPost->save();
        return redirect()->route('pengurus.galeri');

    }

    public function galeriDelete($id){
        $cishani = Galeri::find($id);
        $foto_cishani2 = public_path('client/img/bg-img/'.$cishani->foto);
        // return $foto_cishani2;
        File::delete($foto_cishani2);
        $galeriDelete = Galeri::findOrFail($id)->delete();
        return back();
    }
}
