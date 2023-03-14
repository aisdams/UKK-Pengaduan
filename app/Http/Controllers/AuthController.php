<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function _construct() {
        $this->middleware('auth', ['except'=>['login','register']]);
    }
    public function viewlogin() {
        return view('Auth.login');
    }

    public function viewregister() {
        return view('Auth.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->level == 'petugas') {
                return redirect()->intended('petugas')
                        ->withSuccess('You have Successfully loggedin');
            }
            
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("/dashboard")->with('success', 'User successfully Login');
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_petugas'=>'required|string',
            'username'=>'required|string',
            'telp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'level'=>'required',
            'password' => 'required|string|min:6'
        ]);

        $petugas_nama = $request->nama_petugas;
        $username = $request->username;
        $telp = $request->telp;
        $level = $request->level;
        $password = bcrypt($request->password);

        $id_petugas = Helper::IDGenerator(new User, 'id_petugas', 2, 'STD'); /** Generate id */
        
        $q = new User;
        $q->id_petugas = $id_petugas;
        $q->nama_petugas = $petugas_nama;
        $q->username = $username;
        $q->telp = $telp;
        $q->level = $level;
        $q->password = $password;
        $save =  $q->save();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("auth/login")->with('success', 'User successfully Login');
    }


    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('auth/login');
    }
}
