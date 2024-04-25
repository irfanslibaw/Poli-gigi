<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Notifications\CustomResetPasswordNotification;

class Dokter extends Authenticatable
{
    use HasFactory, Notifiable, AuthenticableTrait;

    protected $table = 'dokters';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'nik',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function rujukan()
    {
        return $this->hasMany(rujukan::class);
    }
}
