<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    public $incrementing = false;
    protected $primaryKey = 'id_ruangan';
    protected $keyType = 'string';
    protected $fillable = [
        'id_ruangan', 'nama_ruangan', 'updated_at', 'created_at'
    ];
}
