<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semester';
    public $incrementing = false;
    protected $primaryKey = 'id_semester';
    protected $keyType = 'string';
    protected $fillable = [
        'id_semester', 'nama_semester'
    ];
    // Relasi ke Kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_semester', 'id_semester');
    }
}
