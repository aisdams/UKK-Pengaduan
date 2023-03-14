<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        $user = User::all();
        $tanggapan = Tanggapan::with('pengaduan','user')->get();
        return view('tanggapan.index', compact('tanggapan','pengaduan','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengaduan = Pengaduan::all();
        $user = User::all();
        $tanggapan = Tanggapan::with('pengaduan','user')->get();
        return view('tanggapan.add', compact('tanggapan','pengaduan','user'));
    }

    public function cetakLaporanPDF($id)
    {
        $pengaduan = Pengaduan::all();
        $user = User::all();
        $tanggapan = Tanggapan::with('pengaduan','user')->find($id);

        $pdf = PDF::loadView('myinvoicepdf', compact('tanggapan','pengaduan','user'));
        return $pdf->download('myinvoicepdf' . $tanggapan->id . '.pdf');
    }

     // Laporan 
     public function LaporanSemua (){
        $pengaduan = Pengaduan::all();
        $user = User::all();
        $tanggapan = Tanggapan::with('pengaduan','user')->get();
        return view('laporan.index', compact('tanggapan','pengaduan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggapan = new Tanggapan;
        $tanggapan->pengaduan_id = $request->input('pengaduan_id');
        $tanggapan->user_id = Auth::user()->id;
        $tanggapan->tgl_tanggapan = $request->input('tgl_tanggapan');
        $tanggapan->tanggapan = $request->input('tanggapan');
        $tanggapan->save($request->all());

        return redirect('tanggapan')->with('success', 'Tanggapan berhasil ditambahkan');
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
        $tanggapan = Tanggapan::find($id);
        $pengaduan = Pengaduan::find($tanggapan->pengaduan_id);
        return view('tanggapan.index', compact('tanggapan', 'pengaduan'));
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
        $tanggapan = Tanggapan::find($id);
        $pengaduan = Pengaduan::find($tanggapan->pengaduan_id);
        
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect('tanggapan')->with('success', 'Tanggapan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
