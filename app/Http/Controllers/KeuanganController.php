<?php

namespace App\Http\Controllers;
use App\Models\pemesanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function index()
    {


// Menggunakan query builder Laravel untuk menghitung jumlah pasien dengan dokter tertentu pada setiap bulan
$results = DB::table('pemesanans')
                ->select(DB::raw('YEAR(tanggal) as tahun'), DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(pelayanans.harga + (obats.harga * pemesanans.jumlah_obat)) as auu'))
                ->join('pelayanans', 'pelayanans.id', '=', 'pemesanans.pelayanan_id')
                ->join('obats', 'obats.id', '=', 'pemesanans.obat_id')
                ->groupBy(DB::raw('MONTH(tanggal)'),DB::raw('YEAR(tanggal)'))
                ->orderBy(DB::raw('MONTH(tanggal)'))
                ->get();



// Melakukan pivot table pada hasil query

        return view('keuangan.index', ['results' => $results]);
    }

    public function cetak()
    {
        $results = DB::table('pemesanans')
        ->select(DB::raw('YEAR(tanggal) as tahun'), DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(pelayanans.harga + (obats.harga * pemesanans.jumlah_obat)) as auu'))
        ->join('pelayanans', 'pelayanans.id', '=', 'pemesanans.pelayanan_id')
        ->join('obats', 'obats.id', '=', 'pemesanans.obat_id')
        ->groupBy(DB::raw('MONTH(tanggal)'),DB::raw('YEAR(tanggal)'))
        ->orderBy(DB::raw('MONTH(tanggal)'))
        ->get();
        $pdf = Pdf::loadView('keuangan.cetak', ['results' => $results]);
        return $pdf->download('keuangan.pdf');

    }

}
