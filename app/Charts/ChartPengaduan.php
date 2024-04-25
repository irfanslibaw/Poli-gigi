<?php

namespace App\Charts;

use App\Models\Pengaduan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\Count;

class ChartPengaduan
{
    protected $chart;

    public function __construct(LarapexChart $charts)
    {
        $this->chart = $charts;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $month1 = Carbon::now()->addMonth(-1)->format('M');
        $month2 = Carbon::now()->addMonth(-2)->format('M');
        $month3 = Carbon::now()->addMonth(-3)->format('M');
        $month4 = Carbon::now()->addMonth(-4)->format('M');
        $month5 = Carbon::now()->addMonth(-5)->format('M');
        $month0 = Carbon::now()->format('M');

        return $this->chart->lineChart()
            ->setTitle('Grafik Pengaduan')
            ->setSubtitle('Umpan Balik dari Pasien Klinik')

            ->addData('Pengaduan', [
                Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-5)->format('m'))->get()->count(),
                Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-4)->format('m'))->get()->count(),
                Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-3)->format('m'))->get()->count(),
                Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-2)->format('m'))->get()->count(),
                Pengaduan::whereMonth('created_at', Carbon::now()->addMonth(-1)->format('m'))->get()->count(),
                Pengaduan::whereMonth('created_at', Carbon::now()->format('m'))->get()->count()
            ])

            ->setXAxis([$month5, $month4, $month3, $month2, $month1, $month0])
            ->setColors(['#155e75',])
            ->setMarkers(['#6b7280', '#fde68a'], 6, 9);
    }
}
