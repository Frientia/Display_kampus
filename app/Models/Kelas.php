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
        'id_kelas', 'nama_kelas', 'id_konsentrasi', 'id_semester', 'updated_at', 'created_at'
    ];

    // Relasi ke Konsentrasi
    public function konsentrasi()
    {
        return $this->belongsTo(Konsentrasi::class, 'id_konsentrasi', 'id_konsentrasi');
    }

    // Relasi ke Semester
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_kelas', 'id_kelas');
    }
}
