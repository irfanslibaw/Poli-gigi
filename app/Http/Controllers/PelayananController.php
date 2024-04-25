<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PelayananController extends Controller
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
            $pelayanan = Pelayanan::where('nama', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $pelayanan = Pelayanan::latest('id')->paginate($baris);
        }

        return view('pelayanan.index')->with('pelayanan',$pelayanan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelayanan.create');
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
        Session::flash('harga',$request->harga);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'harga.required'=>'harga Wajib Diisi',
        ]);
        $pelayanan = [
            'nama'=>$request->nama,
            'harga'=>$request->harga,
        ];
        Pelayanan::create($pelayanan);
        return redirect()->to('pelayanan')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $pelayanan = Pelayanan::where('id', $id)->first();
        return view('pelayanan.edit', compact('pelayanan'));
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
            'harga' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'harga.required'=>'harga Wajib Diisi',
        ]);
        $pelayanan = [
            'nama'=>$request->nama,
            'harga'=>$request->harga,
        ];
        Pelayanan::where('id', $id)->update($pelayanan);
        return redirect()->to('pelayanan')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelayanan::where('id', $id)->delete();
        return redirect()->to('pelayanan')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
