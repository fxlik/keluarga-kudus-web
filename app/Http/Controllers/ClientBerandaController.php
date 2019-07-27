<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tampilan;
use App\Slider;
use App\Event;
use App\Galeri;
use App\Organisasi;

class ClientBerandaController extends Controller
{
    public function beranda(){
        $sejarah = \DB::table('sejarah')->find(1);
        $sambutan = \DB::table('sambutan')->find(1);
        $berita = \App\Berita::orderBy('id', 'DESC')->paginate(3);
        $event = \App\Event::orderBy('tanggal', 'DESC')->paginate(4);
        return view('client.beranda', compact('berita', 'event', 'sejarah', 'sambutan'));
    }

    public function berita(){
        $news = \App\Berita::where('status', 1)->where('kategori', 'berita')->orderBy('created_at', 'DESC')->paginate(6);
        return view('client.berita', compact('news'));
    }

    public function beritaMingguan(){
        $news = \App\Berita::where('status', 1)->where('kategori', 'pengumuman mingguan')->orderBy('created_at', 'DESC')->paginate(6);
        return view('client.berita-mingguan', compact('news'));
    }

    public function beritaKawinan(){
        $news = \App\Berita::where('status', 1)->where('kategori', 'perkawinan')->orderBy('created_at', 'DESC')->paginate(6);
        return view('client.berita-perkawinan', compact('news'));
    }

    public function event(){
        $events = Event::orderBy('tanggal', 'DESC')->paginate(5);
        return view('client.event', compact('events'));
    }

    public function singleEvent($slug)
    {
        $berita = \App\Berita::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
        $event = Event::where('slug', $slug)->first();
        return view('client.event-detail', compact('event', 'berita'));
    }

    public function singleBerita($slug){
        $berita_terbaru = \App\Berita::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
        $berita = \App\Berita::where('slug', $slug)->first();
        return view('client.berita-detail', compact('berita', 'berita_terbaru'));
    }

    public function kirimPesan(Request $request){
        $waktu = \Carbon\Carbon::now();
        // return $waktu;
        \DB::table('pesan')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'pesan' => $request->pesan,
            'created_at' => $waktu,
            'updated_at' => $waktu
        ]);
        return back();
    }

    public function pelayananWilayah(){
        $usulan = \App\Usulan::with('wilayah', 'organisasi', 'seksi')->orderBy('id', 'desc')->paginate(20);
        return view('client.pelayan', compact('usulan'));
    }

    public function tampilan(){
        $tampilan = Tampilan::find(1);
        return $tampilan;
    }
    public function slider(){
        $slider = Slider::all();
        return $slider;
    }

    public function galeri(){
        $galeri = Galeri::orderBy('id', 'DESC')->paginate(10);
        return $galeri;
    }

    public function beritaSidebar(){
        $beritaSidebar = \App\Berita::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
        return $beritaSidebar;
    }
    public function sejarah(){
        $sejarah = \DB::table('sejarah')->find(1);
        return $sejarah;
    }
    public function sambutan(){
        $sambutan = \DB::table('sambutan')->find(1);
        return $sambutan;
    }

    public function organisasi(){
        $organisasi = Organisasi::with('seksi')->where('is_seksiable', 1)->orderBy('id')->get();
        $organisasiinti = Organisasi::with('seksi')->where('is_seksiable', 0)->orderBy('id')->get();
        // return $organisasi;
        return view('client.organisasi', compact('organisasi', 'organisasiinti'));
    }
}
