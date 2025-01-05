<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Konsentrasi;
use App\Models\Prodi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class KonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsentrasi = Konsentrasi::join('prodi', 'konsentrasi.id_prodi', '=', 'prodi.id_prodi')
        ->select('konsentrasi.*', 'prodi.nama_prodi')
        ->get();
        return view('konsentrasi.index', compact('konsentrasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('konsentrasi.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'id_konsentrasi' => 'required',
            'nama_konsentrasi' => 'required|unique:konsentrasi,nama_konsentrasi',
            'id_prodi' => 'required|exists:prodi,id_prodi',
        ]);
        konsentrasi::create([
            'id_konsentrasi' => $request->id_konsentrasi,
            'nama_konsentrasi' => $request->nama_konsentrasi,
            'id_prodi' => $request->id_prodi
        ]);
        return redirect()->route('konsentrasi.index')->with(['berhasil' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $konsentrasi = Konsentrasi::findOrFail($id);
        $prodi = Prodi::all();
        return view('konsentrasi.edit', compact('konsentrasi', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_konsentrasi' => 'required',
            'nama_konsentrasi' => 'required|unique:konsentrasi,nama_konsentrasi,' . $id . ',id_konsentrasi',
            'id_prodi' => 'required',
        ]);
        $konsentrasi = Konsentrasi::findOrFail($id);
        $konsentrasi->update([
            'id_konsentrasi' => $request->id_konsentrasi,
            'nama_konsentrasi' => $request->nama_konsentrasi,
            'id_prodi' => $request->id_prodi
        ]);
        return redirect()->route('konsentrasi.index')->with(['berhasil' => 'Data Berhasil Diupdate!!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsentrasi = Konsentrasi::findOrFail($id);
        $konsentrasi->delete();
        return redirect()->route('konsentrasi.index')->with(['berhasil' => 'Data Berhasil Dihapus']);
    }
}
