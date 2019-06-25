<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusBerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function beranda(){
        $pesan = \DB::table('pesan')->orderBy('created_at')->get();
        $berita = \DB::table('berita')->orderBy('created_at')->get();
        $event = \DB::table('event')->orderBy('tanggal')->get();
        return view('admin.beranda', compact('pesan', 'berita', 'event'));
    }

    public function tampilPesan(){
        $pesan = \DB::table('pesan')->orderBy('created_at', 'DESC')->get();
        return view('admin.pesan', compact('pesan'));
    }

    public function tampilBerita(){
        $berita = \DB::table('berita')->orderBy('created_at', 'DESC')->get();
        return view('admin.berita', compact('berita'));
    }
    public function tampilEvent(){
        $event = \DB::table('event')->orderBy('tanggal', 'DESC')->get();
        return view('admin.event', compact('event'));
    }
    public function tampilOrganisasi(){
        // $event = \DB::table('event')->orderBy('tanggal', 'DESC')->get();
        return view('admin.organisasi');
    }

    public function pesan(){
        $pesan = \DB::table('pesan')->orderBy('created_at', 'DESC')->get();
        return $pesan;
    }
}
