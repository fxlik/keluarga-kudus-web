<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Wilayah;

class PengurusUserController extends Controller
{
    public function index(){
        $user_id = \Auth::user()->id;
        // return $user_id;
        $user = User::where('id', '<>', $user_id)->orderBy('is_verified')->get();
        return view('admin.users', compact('user'));
    }

    public function create(){
        return view('admin.user-create');
    }

    public function jsonWilayah(){
        // $organisasi_id = Input::get('organisasi_id');
        $wilayah = Wilayah::orderBy('id')->get();
        return response()->json($wilayah);
    }

    public function post(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:5', 'max:20', 'unique:users', 'alpha_dash'],
            'email' => 'required|email',
            'password' => ['required', 'min:6'],
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \bcrypt($request->password);
        $user->is_verified = $request->kategori;
        $user->wilayah_id = $request->namawilayah;
        $user->save();
        return redirect()->route('pengurus.userIndex');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function update(Request $request){
        $user = User::find($request->user_id);
        $username = $request->pass;
        $user->update([
            'password' => \bcrypt($username)
        ]);
        return back();
    }

    public function gantiPassword(Request $request){
        $this->validate($request, [
            'passwordin' => ['required', 'min:6'],
        ]);

        $user = User::find($request->userganti_id);
        $username = $request->passwordin;
        $user->update([
            'password' => \bcrypt($username)
        ]);
        return back()->with('success', 'Yee.. Password berhasil diubah');
    }
}
