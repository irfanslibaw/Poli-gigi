<?php

namespace App\Charts;

use App\Models\Pemesanan;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartKehadiran
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $month1 = Carbon::now()->addMonth(-1)->format('M');
        $month2 = Carbon::now()->addMonth(-2)->format('M');
        $month3 = Carbon::now()->addMonth(-3)->format('M');
        $month4 = Carbon::now()->addMonth(-4)->format('M');
        $month5 = Carbon::now()->addMonth(-5)->format('M');
        $month0 = Carbon::now()->format('M');

        return $this->chart->lineChart()
            ->setTitle('Grafik Kehadiran')
            ->setSubtitle('Pengunjung Klinik Sepanjang Tahun')

            ->addData('Pengunjung', [
                Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-5)->format('m'))->get()->count(),
                Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-4)->format('m'))->get()->count(),
                Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-3)->format('m'))->get()->count(),
                Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-2)->format('m'))->get()->count(),
                Pemesanan::whereMonth('tanggal', Carbon::now()->addMonth(-1)->format('m'))->get()->count(),
                Pemesanan::whereMonth('tanggal', Carbon::now()->format('m'))->get()->count()
            ])

            ->setXAxis([$month5, $month4, $month3, $month2, $month1, $month0])
            ->setColors(['#166534'])
            ->setMarkers(['#6b7280', '#fde68a'], 6, 9);
    }
}
