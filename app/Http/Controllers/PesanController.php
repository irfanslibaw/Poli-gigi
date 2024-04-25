<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pemesanan;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Ruang;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pesan.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $ruang = Ruang::all();
        $obat = Obat::all();
        $pelayanan = Pelayanan::all();
        return view('pesan.create', compact('pasien', 'dokter', 'ruang', 'obat', 'pelayanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'ruang_id' => 'required',
            'pelayanan_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'alergi' => 'required',
            'keluhan' => 'required',
            'berat_badan' => 'required',
            'tensi' => 'required',
            'status' => 'required',
        ],[
            'pasien_id.required'=>'pasien_id Wajib Diisi',
            'dokter_id.required'=>'dokter_id Wajib Diisi',
            'ruang_id.required'=>'ruang_id Wajib Diisi',
            'pelayanan_id.required'=>'pelayanan_id Wajib Diisi',
            'tanggal.required'=>'tanggal Wajib Diisi',
            'waktu.required'=>'waktu Wajib Diisi',
            'tensi.required'=>'tensi Wajib Diisi',
            'berat_badan.required'=>'No Hp Wajib Diisi',
            'alergi.required'=>'alergi Wajib Diisi',
            'status.required'=>'status Wajib Diisi',
        ]);
        $pemesanan = [
            'pasien_id'=>$request->pasien_id,
            'dokter_id'=>$request->dokter_id,
            'ruang_id'=>$request->ruang_id,
            'pelayanan_id'=>$request->pelayanan_id,
            'tanggal'=>$request->tanggal,
            'waktu'=>$request->waktu,
            'alergi'=>$request->alergi,
            'keluhan'=>$request->keluhan,
            'berat_badan'=>$request->berat_badan,
            'tensi'=>$request->tensi,
            'status'=>$request->status,
            'obat_id'=>$request->obat_id,
            'jumlah_obat'=>$request->jumlah_obat,
            'catatan'=>$request->catatan,
        ];
        Pemesanan::create($pemesanan);
        return redirect()->to('pesan/create')->with('success', 'Berhasil menambahkan data');
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
        //
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
