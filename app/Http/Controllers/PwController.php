<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Organisasi;
use App\Seksi;
use App\Wilayah;
use Auth;
use App\Usulan;

class PwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function beranda(){
        return view('admin.pw-beranda');
    }

    public function usulan(){
        $user_data = Auth::user();
        $usulan = Usulan::where('wilayah_id', $user_data->wilayah_id)->orderBy('id', 'desc')->get();
        // return $usulan;
        return view('admin.pw-usulan', compact('usulan'));
    }

    public function usulanCreate(){
        $user_data = Auth::user();
        $organisasi = Organisasi::where('is_seksiable', 1)->orderBy('id')->get();
        // return $organisasi;
        return view('admin.pw-usulan-create', compact('user_data', 'organisasi'));
    }

    public function jsonSeksi(){
        $organisasi_id = Input::get('organisasi_id');
        $seksi = Seksi::where('organisasi_id', '=', $organisasi_id)->get();
        return response()->json($seksi);
    }

    public function usulanPost(Request $request){

        $this->validate($request, [
            'organisasi' => 'required',
            'seksi' => 'required',
            'perihal' => 'required',
            'editordata' => 'required',
        ]);

        $usulan = new Usulan;
        $usulan->organisasi_id = $request->organisasi;
        $usulan->seksi_id = $request->seksi;
        $usulan->wilayah_id = $request->wilayah_id;
        $usulan->user_id = $request->user_id;
        $usulan->perihal = $request->perihal;
        $usulan->detail = $request->editordata;
        // file missing
        $usulan->status = 0;
        // tanggapan is null
        $usulan->save();
        return redirect()->route('pw.usulan');
    }

    public function usulanDelete($id){
        $usulan = Usulan::findOrFail($id);
        $usulan->delete();
        return back();
    }
}
