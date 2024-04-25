<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id', 'dokter_id', 'ruang_id', 'pelayanan_id', 'obat_id', 'catatan', 'jumlah_obat', 'tanggal', 'waktu', 'alergi', 'keluhan', 'berat_badan', 'tensi', 'status'];
    protected $table = 'pemesanans';
    public $timestamps = false;

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function pelayanan()
    {
        return $this->belongsTo(Pelayanan::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
