<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Event;
use App\Pesan; 


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

    public function hapusPesan($id){
        $pesanin = Pesan::findOrFail($id)->delete();
        return back();
    }

    public function tampilBerita(){
        if (\Auth::user()->level == 'admin') {
            $user_id = \Auth::user()->id;
            if (\Auth::user()->is_verified == 0) {
                $berita = Berita::with('user')->where('author', $user_id)->orderBy('created_at', 'DESC')->get();
            } else {
                $berita = Berita::with('user')->orderBy('created_at', 'DESC')->get();
            }
            // return $berita;
            return view('admin.berita', compact('berita'));
        }
    }
    
    public function createBerita(){
        return view('admin.berita-create');
    }

    public function postBerita(Request $request){
        $slug = str_slug($request->judul, '-');
        if (Berita::where('slug', $slug)->first() !=null) {
            $slug = $slug.'-'.time();
        }
        if (\Auth::user()->is_verified == 0){
            $statusin = 0;
        } else{
            $statusin = 1;
        }

        $waktu = \Carbon\Carbon::now();

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->slug = $slug;
        $berita->deskripsi = $request->editordata;
        $berita->SEOtitle = $request->judul;
        $berita->SEOdesc = $request->editordata;
        $berita->author = \Auth::user()->id;
        $berita->kategori = $request->kategori;
        $berita->status = $statusin;
        $berita->created_at = $waktu;
        $berita->updated_at = $waktu;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('tn-berita'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $berita->foto = $namafile;
        }
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
        $kategori = $request->kategori;
        $updated_at = $waktuUpdate;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('tn-berita'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $foto = $namafile;
        }else{
            $foto = null;
        }

        $beritaUpdate->update([
            'judul' => $judul,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'SEOtitle' => $SEOtitle,
            'SEOdesc' => $SEOdesc,
            'foto' => $foto,
            'kategori' => $kategori,
            'updated_at' => $updated_at
        ]);

        return redirect()->route('pengurus.berita');
    }

    public function publishBerita(Request $request){
        $beritaPublish = Berita::findOrFail($request->berita_id);
        
        $beritaPublish->update([
            'status' => 1
        ]);
        
        return back();
    }

    public function deleteBerita($id){
        $berita = Berita::findOrFail($id)->delete();
        return back();
    }

    public function tampilEvent(){
        $event = \DB::table('event')->orderBy('tanggal', 'DESC')->get();
        return view('admin.event', compact('event'));
    }

    public function createEvent(){
        return view('admin.event-create');
    }

    public function postEvent(Request $request){
        $slug = str_slug($request->judul, '-');
        if (Event::where('slug', $slug)->first() !=null) {
            $slug = $slug.'-'.time();
        }
        // end
        if (\Auth::user()->is_verified == 0){
            $statusin = 0;
        } else{
            $statusin = 1;
        }

        $waktu = \Carbon\Carbon::now();
        $tanggalin = $request->tanggal;
        $tanggalin2 = strtotime($tanggalin);
        $tanggal = \Carbon\Carbon::createFromTimestamp($tanggalin2);
        $event = new Event;
        $event->judul = $request->judul;
        $event->slug = $slug;
        $event->deskripsi = $request->editordata;
        $event->SEOtitle = $request->judul;
        $event->SEOdesc = $request->editordata;
        $event->tempat = $request->tempat;
        $event->tanggal = $tanggal;
        $event->status = $statusin;
        $event->created_at = $waktu;
        $event->updated_at = $waktu;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('tn-event'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $event->foto = $namafile;
        }
        $event->save();

        return redirect()->route('pengurus.event');
    }

    public function editEvent($id){
        $event = Event::find($id);
        return view('admin.event-edit', compact('event', 'id'));
    }

    public function updateEvent(Request $request){
        $eventUpdate = Event::findOrFail($request->event_id);
        $slug = str_slug($request->judul, '-');
        if (Event::where('slug', $slug)->first() !=null) {
            $slug = $slug.'-'.time();
        }

        $waktuUpdate = \Carbon\Carbon::now();
        if ($request->tanggal != null) {
            $tanggalin = $request->tanggal;
            $tanggalin2 = strtotime($tanggalin);
            $tanggal = \Carbon\Carbon::createFromTimestamp($tanggalin2);
        } else {
            $tanggal = $eventUpdate->tanggal;
        }
        // return $tanggal;

        $judul = $request->judul;
        $slug = $slug;
        $deskripsi = $request->editordata;
        $SEOtitle = $request->judul;
        $SEOdesc = $request->editordata;
        $tempat = $request->tempat;
        $tanggal0 = $tanggal;
        $updated_at = $waktuUpdate;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $namafile = str_slug('tn-event'.'-'.time().'-'.rand(10,100)).'.'.$ext;
            $file->move(public_path('client/img/bg-img'), $namafile);
            $foto = $namafile;
        }else{
            $foto = $eventUpdate->foto;
        }
        

        $eventUpdate->update([
            'judul' => $judul,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'SEOtitle' => $SEOtitle,
            'SEOdesc' => $SEOdesc,
            'foto' => $foto,
            'tanggal' => $tanggal0,
            'tempat' => $tempat,
            'updated_at' => $updated_at
        ]);

        return redirect()->route('pengurus.event');
    }

    public function deleteEvent($id){
        $event= Event::findOrFail($id)->delete();
        return back();
    }

    public function validasiEvent(Request $request){
        $eventPublish = Event::findOrFail($request->event_id);
        
        $eventPublish->update([
            'status' => 1
        ]);
        
        return back();
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
