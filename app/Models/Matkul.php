<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    public $incrementing = false;
    protected $primaryKey = 'id_matkul';
    protected $keyType = 'string';
    protected $fillable = [
        'id_matkul', 'nama_matkul','sks'
    ];
};
