<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    use HasFactory;
    protected $table = 'konsentrasi';
    public $incrementing = false;
    protected $primaryKey = 'id_konsentrasi';
    protected $keyType = 'string';
    protected $fillable = [
        'id_konsentrasi', 'nama_konsentrasi', 'updated_at', 'created_at'
    ];
}
