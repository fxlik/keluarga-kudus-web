<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PengurusController extends Controller
{
    public function halaman_login_operator(){
        if (!Auth::check()) {
            return view('admin.login');
        }else {
            return redirect('pengurus/beranda');
        }
    }

    public function proses_login_operator(Request $request){
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password],true)) {
            
            if(Auth::user()->level == 'admin'){
                return redirect()->intended('pengurus/beranda');
            }
            else{
                return redirect()->intended('pengurus/login');
            }
	    }else {
	        return back()->with('error', 'Username/password salah, periksa kembali!');
	    }
    }

    public function logoutOperator(){
	    \Auth::logout();
	    return redirect('pengurus/login');
  	}
}
