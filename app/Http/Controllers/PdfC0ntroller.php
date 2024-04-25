<?php

namespace App\Http\Controllers;

use App\Models\rujukan;
use App\Models\Dokter;
use App\Models\Pemesanan;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Ruang;
use App\Models\Obat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfC0ntroller extends Controller
{
    public function invoice($id)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $ruang = Ruang::all();
        $obat = Obat::all();
        $pelayanan = Pelayanan::all();
        $pemesanan = Pemesanan::with('pasien', 'dokter', 'ruang', 'obat', 'pelayanan')->where('id', $id)->first();
        $pdf = Pdf::loadView('tagihan.invoice', ['pemesanan' => $pemesanan]);
        return $pdf->download('invoice.pdf');

    }

    public function print($id)
    {
        $pasien = Pasien::all();
        $rujukan = rujukan::with('pasien')->where('id', $id)->first();
        $pdf = Pdf::loadView('rujukan.print', ['rujukan' => $rujukan]);
        return $pdf->download('surat-rujukan.pdf');

    }
}
