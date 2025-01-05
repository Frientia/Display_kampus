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
        'id_konsentrasi', 'nama_konsentrasi', 'id_prodi', 'updated_at', 'created_at'
    ];
    // Relasi ke Kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_konsentrasi', 'id_konsentrasi');
    }
}
