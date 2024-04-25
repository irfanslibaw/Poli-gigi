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


class TagihanController extends Controller
{
    public function info($id)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $ruang = Ruang::all();
        $obat = Obat::all();
        $pelayanan = Pelayanan::all();
        $pemesanan = Pemesanan::with('pasien', 'dokter', 'ruang', 'obat', 'pelayanan')->where('id', $id)->first();
        return view('tagihan.info', compact('pasien', 'dokter', 'ruang', 'obat', 'pelayanan', 'pemesanan'));
    }

    public function destroy($id)
    {
        Pemesanan::where('id', $id)->delete();
        return redirect()->to('pemesanan')->with('success', 'Berhasil melakukan delete data');
    }
}
