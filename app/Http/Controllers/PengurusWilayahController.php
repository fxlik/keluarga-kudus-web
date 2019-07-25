<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\Lingkungan;
use App\User;
use App\Usulan;

class PengurusWilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function wilayah(){
        $wilayah = Wilayah::orderBy('id', 'DESC')->get();
        return view('admin.wilayah', compact('wilayah'));
    }

    public function wilayahPost(Request $request){
        $wilayah = new Wilayah;
        $wilayah->nama = $request->nama_wilayah;
        $wilayah->ketua = $request->nama_ketua;
        $wilayah->save();
        return back();
    }

    public function wilayahKelola($wilayah_id){
        $wilayah = Wilayah::find($wilayah_id);
        $lingkungan = Lingkungan::where('wilayah_id', $wilayah->id)->orderBy('id', 'DESC')->get();
        $pengelola = User::where('wilayah_id', $wilayah->id)->orderBy('id', 'DESC')->get();
        // return $pengelola;
        return view('admin.wilayah-kelola', compact('wilayah', 'lingkungan', 'pengelola'));
    }

    public function wilayahDelete($id){
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();
        return back();
    }

    public function wilayahUpdate(Request $request){
        $wilayah = Wilayah::find($request->wilayah_id);
        $nama_wilayah = $request->edit_namawilayah;
        $ketua = $request->edit_ketua;
        $wilayah->update([
            'nama' => $nama_wilayah,
            'ketua' => $ketua
        ]);
        return back();
    }

    public function lingkunganPost(Request $request){
        $lingkungan = new Lingkungan;
        $lingkungan->wilayah_id = $request->wilayah_id;
        $lingkungan->nama = $request->nama_lingkungan;
        $lingkungan->save();
        return back();
    }

    public function lingkunganDelete($id){
        $lingkungan = Lingkungan::findOrFail($id);
        $lingkungan->delete();
        return back();
    }

    public function lingkunganUpdate(Request $request){
        $lingkungan = Lingkungan::find($request->lingkungan_id);
        $nama_lingkungan = $request->nama_lingkunganedit;
        $lingkungan->update([
            'nama' => $nama_lingkungan
        ]);
        return back();
    }

    public function validasiUsulan(Request $request){
        $usulan = Usulan::with('wilayah', 'organisasi', 'seksi')->where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.validasi-usulan', compact('usulan'));
    }

    public function postValidasiUsulan(Request $request){
        $usulan = Usulan::find($request->usulan_id);
        $status = $request->status;
        $tanggapan = $request->tanggapan;
        $usulan->update([
            'status' => $status,
            'tanggapan' => $tanggapan
        ]);
        return back();
    }
}
