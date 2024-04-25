<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
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
            $pasien = Pasien::where('nama', 'like', "%$katakunci%")
            ->orWhere('nik', 'like', "%$katakunci%")
            ->orWhere('email', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $pasien = Pasien::latest('id')->paginate($baris);
        }

        return view('pasien.index')->with('pasien',$pasien);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama',$request->nama);
        Session::flash('umur',$request->umur);
        Session::flash('alamat',$request->alamat);
        Session::flash('email',$request->email);
        Session::flash('no_hp',$request->no_hp);
        Session::flash('nik',$request->nik);
        Session::flash('jenis_kelamin',$request->jenis_kelamin);

        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required|numeric',
            'nik' => 'required|numeric|unique:pasiens,nik',
            'jenis_kelamin' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'umur.required'=>'umur Wajib Diisi',
            'umur.numeric'=>'umur Wajib Dalam Angka',
            'nik.unique'=>'NIK Yang Diisikan Sudah Ada Dalam Database',
            'nik.numeric'=>'NIK Wajib Dalam Angka',
            'nik.required'=>'NIK Wajib Diisi',
            'no_hp.numeric'=>'No Hp Wajib Dalam Angka',
            'no_hp.required'=>'No Hp Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
            'email.required'=>'Alamat Wajib Diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib Diisi',
        ]);
        $pasien = [
            'nama'=>$request->nama,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'nik'=>$request->nik,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ];
        Pasien::create($pasien);
        return redirect()->to('pasien')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $pasien = pasien::where('id', $id)->first();
        return view('pasien.edit', compact('pasien'));
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
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'umur.required'=>'umur Wajib Diisi',
            'alamat.required'=>'alamat Wajib Diisi',
            'email.required'=>'email Wajib Diisi',
            'no_hp.required'=>'no hp Wajib Diisi',
            'nik.required'=>'nik Wajib Diisi',
            'jenis_kelamin.required'=>'Jenis kelamin Wajib Diisi',
        ]);
        $pasien = [
            'nama'=>$request->nama,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'nik'=>$request->nik,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ];
        Pasien::where('id', $id)->update($pasien);
        return redirect()->to('pasien')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('id', $id)->delete();
        return redirect()->to('pasien')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
