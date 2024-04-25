<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ruangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ruang = Ruang::latest('id')->paginate(2);
        return view('ruang.index')->with('ruang',$ruang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama_ruang',$request->nama_ruang);

        $request->validate([
            'nama_ruang' => 'required',
        ],[
            'nama_ruang.required'=>'nama_ruang Wajib Diisi',
        ]);
        $ruang = [
            'nama_ruang'=>$request->nama_ruang,
        ];
        Ruang::create($ruang);
        return redirect()->to('ruang')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $ruang = Ruang::where('id', $id)->first();
        return view('ruang.edit', compact('ruang'));
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
            'nama_ruang' => 'required',
        ],[
            'nama_ruang.required'=>'nama_ruang Wajib Diisi',
        ]);
        $ruang = [
            'nama_ruang'=>$request->nama_ruang,
        ];

        Ruang::where('id', $id)->update($ruang);
        return redirect()->to('ruang')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Ruang::where('id', $id)->delete();
        return redirect()->to('ruang')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
