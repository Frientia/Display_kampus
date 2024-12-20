<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::orderBy('created_at', 'DESC')->get();
        return view('ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'id_ruangan' => 'required',
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan',
        ]);
        Ruangan::create([
            'id_ruangan' => $request->id_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);
        return redirect()->route('ruangan.index')->with(['berhasil' => 'Data Berhasil Disimpan!']);
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
        $ruangan = Ruangan::find($id);
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_ruangan' => 'required',
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan,' . $id . ',id_ruangan',
        ]);
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update([
            'id_ruangan' => $request->id_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);
        return redirect()->route('ruangan.index')->with(['berhasil' => 'Data Berhasil Diupdate!!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with(['berhasil' => 'Data Berhasil Dihapus']);
    }
}
