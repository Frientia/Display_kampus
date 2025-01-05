<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;

    protected $table = 'akuns';

    protected $fillable = [
        'username',
        'password',
    ];

    public $timestamps = true; // Sesuaikan dengan kolom `created_at` dan `updated_at` di tabel `akuns`
}
