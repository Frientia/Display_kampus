<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Kelas;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    // Menampilkan form untuk membuat jadwal baru
    public function create()
    {
        $dosen = Dosen::all();
        $matkul = Matkul::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        return view('jadwal.create', compact('dosen','matkul','kelas','ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_selesai' => 'required',
            'id_matkul' => 'required|exists:matkul,id_matkul',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_ruangan' => 'required|exists:ruangan,id_ruangan',
            'id_kelas' => 'required|exists:kelas,id_kelas',
        ]);


        Jadwal::create([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_selesai' => $request->jam_selesai,
            'id_matkul' => $request->id_matkul,
            'id_dosen' => $request->id_dosen,
            'id_ruangan' => $request->id_ruangan,
            'id_kelas' => $request->id_kelas,
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }
    
    // Menampilkan form edit berdasarkan ID
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dosen = Dosen::all();
        $matkul = Matkul::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        return view('jadwal.edit', compact('jadwal', 'dosen', 'matkul','kelas','ruangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_selesai' => 'required',
            'id_matkul' => 'required|exists:matkul,id_matkul',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_ruangan' => 'required|exists:ruangan,id_ruangan',
            'id_kelas' => 'required|exists:kelas,id_kelas',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }


    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
