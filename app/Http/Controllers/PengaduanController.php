<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
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
            $pengaduan = Pengaduan::where('pengaduan', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $pengaduan = Pengaduan::with('pasien')->latest('id')->paginate($baris);
        }

        return view('pengaduan.index')->with('pengaduan',$pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        return view('pengaduan.create', compact('pasien'));
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
        Session::flash('pengaduan',$request->pengaduan);

        $request->validate([
            'pasien_id' => 'required',
            'pengaduan' => 'required',
        ],[
            'pasien_id.required'=>'pasien Wajib Diisi',
            'pengaduan.required'=>'pengaduan Wajib Diisi',
        ]);
        $pengaduan = [
            'pasien_id'=>$request->pasien_id,
            'pengaduan'=>$request->pengaduan,
        ];
        Pengaduan::create($pengaduan);
        return redirect()->to('pengaduan')->with('success','Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $pengaduan = Pengaduan::with('pasien')->where('id', $id)->first();
        return view('pengaduan.edit', compact('pengaduan','pasien'));
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
        $request->validate([
            'pasien_id' => 'required',
            'pengaduan' => 'required',
        ],[
            'pasien_id.required'=>'nik Wajib Diisi',
            'pengaduan.required'=>'Jenis kelamin Wajib Diisi',
        ]);
        $pengaduan = [
            'pasien_id'=>$request->pasien_id,
            'pengaduan'=>$request->pengaduan,
        ];
        Pengaduan::where('id', $id)->update($pengaduan);
        return redirect()->to('pengaduan')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::where('id', $id)->delete();
        return redirect()->to('pengaduan')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
