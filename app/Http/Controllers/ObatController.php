<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ObatController extends Controller
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
            $obat = Obat::where('nama', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $obat = Obat::latest('id')->paginate($baris);
        }

        return view('obat.index')->with('obat',$obat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
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
        Session::flash('stok',$request->stok);
        Session::flash('harga',$request->harga);

        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'stok.numeric'=>'stok Wajib Dalam Angka',
            'stok.required'=>'stok Wajib Diisi',
            'harga.required'=>'harga Wajib Diisi',
        ]);
        $obat = [
            'nama'=>$request->nama,
            'stok'=>$request->stok,
            'harga'=>$request->harga,
        ];
        Obat::create($obat);
        return redirect()->to('obat')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $obat = Obat::where('id', $id)->first();
        return view('obat.edit', compact('obat'));
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
            'stok' => 'required',
            'harga' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'harga.required'=>'harga Wajib Diisi',
            'stok.required'=>'stok Wajib Diisi',
        ]);
        $obat = [
            'stok'=>$request->stok,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
        ];
        Obat::where('id', $id)->update($obat);
        return redirect()->to('obat')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::where('id', $id)->delete();
        return redirect()->to('obat')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
