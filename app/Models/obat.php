<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'stok', 'harga'];
    protected $table = 'obats';
    public $timestamps = false;


    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
