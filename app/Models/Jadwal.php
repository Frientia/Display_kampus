<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'tanggal',
        'jam_masuk',
        'jam_selesai',
        'id_matkul',
        'id_dosen',
        'id_ruangan',
        'id_kelas',
        'created_at',
        'updated_at',
    ];
}
