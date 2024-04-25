<?php

namespace App\Http\Controllers;

use App\Charts\ChartKehadiran;
use App\Charts\ChartPengaduan;
use App\Models\pasien;
use App\Models\pemesanan;
use App\Models\pengaduan;
use App\Models\obat;
use App\Models\pelayanan;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexx(ChartKehadiran $chart, ChartPengaduan $charts)
    {

        $pasien = Pasien::all()->count();
        $pemesanann = Pemesanan::all()->count();
        $pemesanan_belum = Pemesanan::where('status', 'B')->count();

        $pasien_bulan = Pasien::whereMonth('created_at', Carbon::now()->format('m'))->get()->count();
        $pemesanan_bulan = Pemesanan::whereMonth('tanggal', Carbon::now()->format('m'))->get()->count();
        $pending = Pemesanan::whereDay('tanggal', Carbon::now()->format('d'))->get()->count();

        $grafikalalu = Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-1)->format('m'))->get()->count();

        $pengaduan = Pengaduan::all()->count();
        $pengaduan_bulan = Pengaduan::whereMonth('created_at', Carbon::now()->format('m'))->get()->count();
        $adu_grafik = Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-1)->format('m'))->get()->count();


        // $pemesanans = Pemesanan::all();
        // $total_harga = $pemesanans->sum(function($pemesanan) {
        //     return $pemesanan->pelayanan->harga + ($pemesanan->obat->harga * $pemesanan->jumlah_obat);
        // });

            $result = Pemesanan::select(DB::raw('SUM(pelayanans.harga + (obats.harga * pemesanans.jumlah_obat)) as total_harga'))
            ->join('pelayanans', 'pelayanans.id', '=', 'pemesanans.pelayanan_id')
            ->join('obats', 'obats.id', '=', 'pemesanans.obat_id')
            ->get();
            $total_harga = $result[0]->total_harga;


            $miaw = Pemesanan::whereMonth('tanggal', Carbon::now()->format('m'))->select(DB::raw('SUM(pelayanans.harga + (obats.harga * pemesanans.jumlah_obat)) as auu'))
            ->join('pelayanans', 'pelayanans.id', '=', 'pemesanans.pelayanan_id')
            ->join('obats', 'obats.id', '=', 'pemesanans.obat_id')
            ->get();
            $auu = $miaw[0]->auu;

             return view('dashboard', [
                    'chart' => $chart->build(),
                    'charts' => $charts->build(),
                    'total_harga' => $total_harga,
                ])
            ->with('pasien', $pasien)
            ->with('pemesanann', $pemesanann)
            ->with('pemesanan_belum', $pemesanan_belum)

            ->with('pasien_bulan', $pasien_bulan)
            ->with('pemesanan_bulan', $pemesanan_bulan)
            ->with('pending', $pending)

            ->with('grafikalalu', $grafikalalu)

            ->with('pengaduan', $pengaduan)
            ->with('pengaduan_bulan', $pengaduan_bulan)
            ->with('adu_grafik', $adu_grafik)

            ->with('total_harga', $total_harga)
            ->with('auu', $auu);

    }

}
