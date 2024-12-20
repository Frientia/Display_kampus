<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    public $incrementing = false;
    protected $primaryKey = 'id_kelas';
    protected $keyType = 'string';
    protected $fillable = [
        'id_kelas', 'nama_kelas', 'updated_at', 'created_at'
    ];
};
