<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    public $incrementing = false;
    protected $primaryKey = 'id_dosen';
    protected $keyType = 'string';
    protected $fillable = [
        'id_dosen', 'nama_dosen', 'email', 'no_telp'
    ];
};
