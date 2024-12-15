<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Matkul;
use Illuminate\Support\Facades\Redirect;


class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::join('matkul', 'dosen.id_matkul', '=', 'matkul.id_matkul')
        ->select('dosen.*', 'matkul.nama_matkul')
        ->get();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        $matkuls = Matkul::all();
        return view('dosen.create', compact('matkuls'));
    }

    public function store(Request $request):RedirectResponse
    {
        //validate form
        $request->validate([
            'id_dosen' => 'required',
            'nama_dosen' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric',
            'id_matkul' => 'required|exists:matkul,id_matkul', // Validasi: harus ada di tabel `matkul`
        ]);
        Dosen::create([
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'id_matkul' => $request->id_matkul
        ]);
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id):View
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit', compact('dosen'));
    }
    public function update(Request $request, string $id ):RedirectResponse
    {
        $request->validate([
            'id_dosen' => 'required',
            'nama_dosen' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric',
            'id_matkul' => 'required',
        ]);
        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'id_matkul' => $request->id_matkul
        ]);
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data berhasil diupdate!!']);
    }

    public function destroy(string $id):RedirectResponse
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data berhasil dihapus']);
    }

}
