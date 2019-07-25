<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisasi;
use App\Seksi;
use App\Usulan;

class PengurusOrganisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function organisasi(){
        $org = Organisasi::orderBy('id', 'DESC')->get();
        return view('admin.organisasi', compact('org'));
    }

    public function organisasiPost(Request $request){
        $org = new Organisasi;
        $org->nama = $request->nama_organisasi;
        $org->pj = $request->nama_ketua;
        $org->save();
        return back();
    }

    public function organisasiDelete($id){
        $org = Organisasi::findOrFail($id);
        $org->delete();
        return back();
    }

    public function organisasiUpdate(Request $request){
        $organisasi = Organisasi::find($request->wilayah_id);
        $nama = $request->edit_namawilayah;
        $pj = $request->edit_ketua;
        $organisasi->update([
            'nama' => $nama,
            'pj' => $pj
        ]);
        return back();
    }

    public function organisasiDetail($organisasi_id){
        $organisasi = organisasi::find($organisasi_id);
        $seksi = Seksi::where('organisasi_id', $organisasi->id)->orderBy('id', 'DESC')->get();
        // return $seksi;
        return view('admin.organisasi-seksi', compact('organisasi', 'seksi'));
    }

    public function seksiPost(Request $request){
        $seksi = new Seksi;
        $seksi->organisasi_id = $request->organisasi_id;
        $seksi->nama = $request->nama_seksi;
        $seksi->pj = $request->nama_pj;
        $seksi->save();
        return back();
    }

    public function seksiDelete($id){
        $seksi = Seksi::findOrFail($id);
        $seksi->delete();
        return back();
    }

    public function seksiUpdate(Request $request){
        $seksi = Seksi::find($request->seksi_id);
        $nama_seksi = $request->nama_seksiedit;
        $nama_pj = $request->nama_pjedit;
        $seksi->update([
            'nama' => $nama_seksi,
            'pj' => $nama_pj
        ]);
        return back();
    }

    public function pelayananOrganisasi($organisasi_id){
        $organisasi = organisasi::find($organisasi_id);
        $usulan = Usulan::with('seksi')->where('organisasi_id', $organisasi->id)->orderBy('id', 'desc')->get();
        return view('admin.organisasi-pelayanan', compact('usulan','organisasi'));
    }
}
