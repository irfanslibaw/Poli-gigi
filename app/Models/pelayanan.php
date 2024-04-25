<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelayanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama','harga'];
    protected $table = 'pelayanans';
    public $timestamps = true;

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function rekam_medis()
    {
        return $this->hasMany(Rekam_medis::class);
    }
}
