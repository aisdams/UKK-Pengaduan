<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewlogin() {
        return view('masyarakat.login');
    }

    public function viewregister() {
        return view('masyarakat.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("/masyarakat")->with('success', 'User successfully Login');
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:13',
            'nama' => 'required|string',
            'username' => 'required|string',
            'notlp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        $user = Masyarakat::create(array_merge(
           $validator->validated(),
           ['password'=>bcrypt($request->password)] 
        ));
        return redirect("authmasyarakat/login")->with('success', 'User successfully Login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('authmasyarakat/login');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
