<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

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
    
    public function createBerita(){
        return view('admin.berita-create');
    }

    public function postBerita(Request $request){
        $slug = str_slug($request->judul, '-');
        if (Berita::where('slug', $slug)->first() !=null) {
            $slug = $slug.'-'.time();
        }

        $waktu = \Carbon\Carbon::now();

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->slug = $slug;
        $berita->deskripsi = $request->editordata;
        $berita->SEOtitle = $request->judul;
        $berita->SEOdesc = $request->editordata;
        $berita->author = \Auth::user()->id;
        $berita->status = 1;
        $berita->created_at = $waktu;
        $berita->updated_at = $waktu;
        $berita->save();

        return redirect()->route('pengurus.berita');
    }

    public function editBerita($id){
        $berita = Berita::find($id);
        return view('admin.berita-edit', compact('berita', 'id'));
    }

    public function updateBerita(Request $request){
        $beritaUpdate = Berita::findOrFail($request->berita_id);
        $slug = str_slug($request->judul, '-');
        if (Berita::where('slug', $slug)->first() !=null) {
            $slug = $slug.'-'.time();
        }

        $waktuUpdate = \Carbon\Carbon::now();

        $judul = $request->judul;
        $slug = $slug;
        $deskripsi = $request->editordata;
        $SEOtitle = $request->judul;
        $SEOdesc = $request->editordata;
        $updated_at = $waktuUpdate;

        $beritaUpdate->update([
            'judul' => $judul,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'SEOtitle' => $SEOtitle,
            'SEOdesc' => $SEOdesc,
            'updated_at' => $updated_at
        ]);

        return redirect()->route('pengurus.berita');
    }

    public function deleteBerita($id){
        $berita = Berita::findOrFail($id)->delete();
        return back();
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
