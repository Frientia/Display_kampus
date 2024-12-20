<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'DESC')->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //validate form
       $request->validate([
        'id_kelas' => 'required',
        'nama_kelas' => 'required|unique:kelas,nama_kelas',
    ]);
    Kelas::create([
        'id_kelas' => $request->id_kelas,
        'nama_kelas' => $request->nama_kelas
    ]);
    return redirect()->route('kelas.index')->with(['berhasil' => 'Data Berhasil Disimpan!']);
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
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kelas' => 'required',
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $id . ',id_kelas',
        ]);
        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas
        ]);
        return redirect()->route('kelas.index')->with(['berhasil' => 'Data Berhasil Diupdate!!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with(['berhasil' => 'Data Berhasil Dihapus']);
    }
}
