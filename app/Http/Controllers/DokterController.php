<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Http\Requests\StoreDokterRequest;
use App\Http\Requests\UpdateDokterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\pemesanan;
use App\Models\pasien;
use Carbon\Carbon;

class DokterController extends Controller
{
    public function dashboard()
{
    {
        $pasien = Pasien::all()->count();
        $pemesanan = Pemesanan::all()->count();
        $pasien_saya = Pemesanan::where('dokter_id', auth()->user()->id)->count();
        $pemesanan_belum = Pemesanan::where('dokter_id', auth()->user()->id)->where('status', 'B')->count();

        $pasien_bulan = Pasien::whereMonth('created_at', Carbon::now()->format('m'))->get()->count();
        $pemesanan_bulan = Pemesanan::whereMonth('tanggal', Carbon::now()->format('m'))->get()->count();
        $saya_bulan = Pemesanan::where('dokter_id', auth()->user()->id)->whereMonth('tanggal', Carbon::now()->format('m'))->get()->count();
        $pending = Pemesanan::where('dokter_id', auth()->user()->id)->whereDay('tanggal', Carbon::now()->format('d'))->get()->count();

        $belum = Pemesanan::where('dokter_id', auth()->user()->id)->where('status', 'B')->orderBy('tanggal', 'asc')->paginate(10);
        $sudah = Pemesanan::where('dokter_id', auth()->user()->id)->where('status', 'S')->orderBy('tanggal', 'asc')->paginate(10);

        return view('dashboarddokter')

            ->with('pasien', $pasien)
            ->with('pemesanan', $pemesanan)
            ->with('pasien_saya', $pasien_saya)
            ->with('pemesanan_belum', $pemesanan_belum)

            ->with('pasien_bulan', $pasien_bulan)
            ->with('pemesanan_bulan', $pemesanan_bulan)
            ->with('saya_bulan', $saya_bulan)
            ->with('pending', $pending)
            ->with('belum', $belum)
            ->with('sudah', $sudah);

    }
}

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
            $dokter = Dokter::where('nama', 'like', "%$katakunci%")
            ->orWhere('nik', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $dokter = Dokter::latest('id')->paginate($baris);
        }

        return view('dokter.index')->with('dokter',$dokter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
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
        Session::flash('email',$request->email);
        Session::flash('no_hp',$request->no_hp);
        Session::flash('nik',$request->nik);
        Session::flash('password',$request->password);

        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required|unique:dokters,email',
            'no_hp' => 'required|numeric',
            'nik' => 'required|numeric|unique:dokters,nik',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'nik.unique'=>'NIK Yang Diisikan Sudah Ada Dalam Database',
            'nik.numeric'=>'NIK Wajib Dalam Angka',
            'nik.required'=>'NIK Wajib Diisi',
            'no_hp.numeric'=>'No Hp Wajib Dalam Angka',
            'no_hp.required'=>'No Hp Wajib Diisi',
            'email.required'=>'email Wajib Diisi',
            'email.unique'=>'Email Yang Diisikan Sudah Ada Dalam Database',
            'password.required'=>'password Wajib Diisi',
        ]);
        $dokter = [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'nik'=>$request->nik,
            'password'=>Hash::make($request->password),
        ];
        Dokter::create($dokter);
        return redirect()->to('dokter')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
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
        $dokter = Dokter::where('id', $id)->first();
        return view('dokter.edit', compact('dokter'));
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
            'email' => 'required',
            'no_hp' => 'required',
            'nik' => 'required',
            'password' => 'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'password.required'=>'password Wajib Diisi',
            'email.required'=>'email Wajib Diisi',
            'no_hp.required'=>'no hp Wajib Diisi',
            'nik.required'=>'nik Wajib Diisi',
        ]);
        $dokter = [
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'password'=>Hash::make($request->password),
        ];
        Dokter::where('id', $id)->update($dokter);
        return redirect()->to('dokter')->with('successe', 'Pastikan kembali jika data yang diubah telah sesuai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::where('id', $id)->delete();
        return redirect()->to('dokter')->with('successd', 'Tetap berhati-hati dengan data yang akan dihapus.');
    }
}
