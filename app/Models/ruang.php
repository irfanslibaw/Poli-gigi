<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_ruang'];
    protected $table = 'ruangs';
    public $timestamps = false;

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function rekam_medis()
    {
        return $this->hasMany(Rekam_medis::class);
    }
}
