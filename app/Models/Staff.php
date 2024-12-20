<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id_staff';
    protected $keyType = 'string';
    protected $fillable = [
        'id_staff', 'nama_staff', 'jabatan', 'no_telp'
    ];
};
