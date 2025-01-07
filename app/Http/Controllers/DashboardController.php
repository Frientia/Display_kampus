<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $agendaCount = DB::table('agenda')->count(); // Hitung total data dari tabel 'agenda'
        $akunsCount = DB::table('akuns')->count();
        $dosenCount = DB::table('dosen')->count();
        $jadwalCount = DB::table('jadwal')->count();
        $kelasCount = DB::table('kelas')->count();
        $matkulCount = DB::table('matkul')->count(); // Ganti semesterCount menjadi matkulCount

        // Kirim data ke view
        return view('dashboard', [
            'agendaCount' => $agendaCount,
            'akunsCount' => $akunsCount,
            'dosenCount' => $dosenCount,
            'jadwalCount' => $jadwalCount,
            'kelasCount' => $kelasCount,
            'matkulCount' => $matkulCount, // Sesuaikan dengan yang ada di view
        ]);
    }
}



