<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rujukan extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id',
    'dokter_id',
    'umur',
    'alamat',
    'no_hp',
    'keluhan',
    'diagnosa',
    'kasus',
    'terapi',
    'tanggal',
    'dr_tujuan',
    'rs_tujuan'];
    protected $table = 'rujukans';
    public $timestamps = false;


    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
