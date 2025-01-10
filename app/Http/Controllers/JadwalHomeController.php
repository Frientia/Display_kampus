<?php
namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Konsentrasi;
use App\Models\Ruangan;
use App\Models\Matkul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $konsentrasiId = $request->input('konsentrasi', ''); // Filter konsentrasi kosong jika tidak dipilih
        $semesterId = $request->input('semester', ''); // Filter semester kosong jika tidak dipilih
        
        // Ambil semua data konsentrasi dan semester
        $konsentrasiList = DB::table('konsentrasi')
            ->pluck('nama_konsentrasi', 'id_konsentrasi');
        
        $semesterList = DB::table('semester')
            ->pluck('nama_semester', 'id_semester');
        
        // Query jadwal berdasarkan filter ID konsentrasi dan ID semester
        $jadwalQuery = DB::table('jadwal')
            ->join('matkul', 'jadwal.id_matkul', '=', 'matkul.id_matkul')
            ->join('ruangan', 'jadwal.id_ruangan', '=', 'ruangan.id_ruangan')
            ->join('dosen', 'jadwal.id_dosen', '=', 'dosen.id_dosen')
            ->join('kelas', 'jadwal.id_kelas', '=', 'kelas.id_kelas')
            ->join('konsentrasi', 'kelas.id_konsentrasi', '=', 'konsentrasi.id_konsentrasi')
            ->join('semester', 'kelas.id_semester', '=', 'semester.id_semester')
            ->select(
                'jadwal.hari',
                'jadwal.tanggal',
                'jadwal.jam_masuk',
                'jadwal.jam_selesai',
                'matkul.nama_matkul',
                'matkul.sks',
                'ruangan.nama_ruangan',
                'dosen.nama_dosen',
                'konsentrasi.nama_konsentrasi',
                'semester.nama_semester',
                'kelas.nama_kelas'
            );
        
        // Filter berdasarkan ID konsentrasi jika ada
        if (!empty($konsentrasiId)) {
            $jadwalQuery->where('konsentrasi.id_konsentrasi', $konsentrasiId);
        }
        
        // Filter berdasarkan ID semester jika ada
        if (!empty($semesterId)) {
            $jadwalQuery->where('kelas.id_semester', $semesterId);
        }
        
        // Ambil data jadwal
        $jadwal = $jadwalQuery->get();
        
        return view('Jadwal', [
            'jadwal' => $jadwal,
            'konsentrasiList' => $konsentrasiList,
            'semesterList' => $semesterList,
            'konsentrasiId' => $konsentrasiId,
            'semesterId' => $semesterId,
        ]);
    }
        
    // ... metode lain tetap sama
}
