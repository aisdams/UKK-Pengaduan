<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $petugass = User::get();

    	$petugass = User::where('level', 'petugas')->get();
        return view('petugas.index', compact('petugass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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

        if($validated->fails()) {
            return Redirect::back()->withErrors($validated)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("data-petugas")->with('success', 'Data petugas berhasil di tambahkan');
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
        $petugas = User::find($id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::find($id);
        $petugas->update($request->all());
        return redirect("/data-petugas")->with('success','Data Petugas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Petugas Berhasil Di Delete");
    }
}