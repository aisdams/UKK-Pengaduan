<?php

namespace App\Http\Controllers;

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
        //
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
        // Update status pengaduan
        $pengaduan = $tanggapan->pengaduan;
        if ($request->input('status') == 'diproses') {
            $pengaduan->status = 'proses';
        } elseif ($request->input('status') == 'ditolak') {
            $pengaduan->status = 'selesai';
        }
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
