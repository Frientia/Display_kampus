<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Matkul;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class MatkulController extends Controller
{
    public function index()
    {
        $matkul = Matkul::orderBy('created_at', 'DESC')->get();
        return view('matkul.index', compact('matkul'));
    }

    public function create()
    {
        return view('matkul.create');
    }

    public function store(Request $request):RedirectResponse
    {
        //validate form
        $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required'
        ]);
        Matkul::create([
            'id_matkul' => $request->id_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks
        ]);
        return redirect()->route('matkul.index')->with(['berhasil' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id):View
    {
        $matkul = Matkul::find($id);
        return view('matkul.edit', compact('matkul'));
    }
    public function update(Request $request, string $id ):RedirectResponse
    {
        $request->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required'
        ]);
        $matkul = Matkul::findOrFail($id);
        $matkul->update([
            'id_matkul' => $request->id_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks
        ]);
        return redirect()->route('matkul.index')->with(['berhasil' => 'Data Berhasil Diupdate!!']);
    }

    public function destroy(string $id):RedirectResponse
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();
        return redirect()->route('matkul.index')->with(['berhasil' => 'Data Berhasil Dihapus']);
    }

}
