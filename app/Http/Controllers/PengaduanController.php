<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        $tanggapan = Tanggapan::all();
        $pengaduan = Pengaduan::with('masyarakat','tanggapan')->get();
        return view('Masyarakat.dashboard', compact('masyarakat','pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Masyarakat.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pt = $request->foto;
        $ptFile = $pt->getClientOriginalName();
        $pt->move(public_path().'/img',$ptFile);
        Pengaduan::create([
            'nama' => $request->nama,
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'nik' => $request->nik,
            'isilaporan' => $request->isilaporan,
            'foto' => $ptFile,
        ]);

        return redirect("/masyarakat")->with('success','Data Pengaduan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masyarakat = Masyarakat::all();
        $pengaduan = Pengaduan::find($id);
        return view('Masyarakat.dashboard', compact('masyarakat','pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Oengaduan::findorfail($id);
        $pengaduan -> update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $pengaduan->foto = $request->file('foto')->getClientOriginalName();
            $pengaduan -> save();
        }
        return redirect("/masyarakat")->with('success','Data Pengaduan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pengaduan::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Pengaduan Berhasil Dihapus");
    }
}
