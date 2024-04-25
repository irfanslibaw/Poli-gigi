<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id','pengaduan'];
    protected $table = 'pengaduans';
    public $timestamps = true;

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
