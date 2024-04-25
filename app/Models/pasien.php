<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = ['nama','umur', 'email', 'no_hp', 'nik', 'jenis_kelamin','alamat'];
    protected $table = 'pasiens';
    public $timestamps = true;

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function rujukan()
    {
        return $this->hasMany(Rujukan::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }


}
