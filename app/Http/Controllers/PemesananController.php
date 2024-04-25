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


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $baris = 10;
        if (strlen($katakunci)){
            $pemesanan = Pemesanan::where('tanggal', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $pemesanan = Pemesanan::with('pasien', 'dokter', 'ruang', 'pelayanan')->latest('id')->paginate($baris);
        }

        return view('pemesanan.index')->with('pemesanan',$pemesanan);
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
        return view('pemesanan.create', compact('pasien', 'dokter', 'ruang', 'obat', 'pelayanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('pasien_id',$request->pasien_id);
        Session::flash('dokter_id',$request->dokter_id);
        Session::flash('ruang_id',$request->ruang_id);
        Session::flash('pelayanan_id',$request->pelayanan_id);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('waktu',$request->waktu);
        Session::flash('alergi',$request->alergi);
        Session::flash('keluhan',$request->keluhan);
        Session::flash('berat_badan',$request->berat_badan);
        Session::flash('tensi',$request->tensi);
        Session::flash('status',$request->status);
        Session::flash('obat_id',$request->obat_id);
        Session::flash('jumlah_obat',$request->jumlah_obat);
        Session::flash('catatan',$request->catatan);

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
        return redirect()->to('pemesanan')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $ruang = Ruang::all();
        $obat = Obat::all();
        $pelayanan = Pelayanan::all();
        $pemesanan = Pemesanan::with('pasien', 'dokter', 'ruang', 'obat', 'pelayanan')->where('id', $id)->first();
        return view('dokpasien.edit', compact('pasien', 'dokter', 'ruang', 'obat', 'pelayanan', 'pemesanan'));
    }

    /**.
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            'obat_id'=>'required',
            'jumlah_obat'=>'required',
            'catatan'=>'required',
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
            'obat_id.required'=>'status Wajib Diisi',
            'jumlah_obat.required'=>'status Wajib Diisi',
            'catatan.required'=>'status Wajib Diisi',
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
        Pemesanan::where('id', $id)->update($pemesanan);
        return redirect()->to('dokpasien')->with('success', 'Berhasil mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemesanan::where('id', $id)->delete();
        return redirect()->to('pemesanan')->with('success', 'Berhasil melakukan delete data');
    }
}
