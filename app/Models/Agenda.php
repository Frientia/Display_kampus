<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    public $incrementing = false;
    protected $primaryKey = 'id_agenda';
    protected $keyType = 'string';
    protected $fillable = ['id_agenda','nama_agenda','tanggal','waktu_mulai','waktu_selesai','deskripsi','lokasi',];
}
