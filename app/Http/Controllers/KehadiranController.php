<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pemesanan;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Ruang;
use App\Models\Obat;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class KehadiranController extends Controller
{
    public function info()
    {
        // $saya_bulan = Pemesanan::where('dokter_id', auth()->user()->id)->whereMonth('tanggal', Carbon::now()->startOfYear()->format('M'))->get()->count();

    // Mendapatkan tahun saat ini
    $currentYear = Carbon::now()->year;
    $dokterId = Auth::user()->id;


// Menggunakan query builder Laravel untuk menghitung jumlah pasien dengan dokter tertentu pada setiap bulan
$results = DB::table('pemesanans')
                ->select(DB::raw('MONTH(tanggal) as bulan'), 'dokter_id', DB::raw('COUNT(pasien_id) as jumlah_pasien'))
                ->whereYear('tanggal', '=', $currentYear)
                ->where('dokter_id', '=', $dokterId) // Menambahkan kondisi where untuk filter data dokter yang bersangkutan
                ->groupBy(DB::raw('MONTH(tanggal)'), 'dokter_id')
                ->orderBy(DB::raw('MONTH(tanggal)'))
                ->get();

        return view('kehadiran.index',  ['results' => $results]);
    }
}
