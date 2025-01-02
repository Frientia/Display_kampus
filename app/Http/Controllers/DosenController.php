<?php

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'DESC')->get();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request):RedirectResponse
    {
        //validate form
        $request->validate([
            'id_dosen' => 'required',
            'nama_dosen' => 'required',
            'email' => 'required',
            'no_telp'=> 'required'
        ]);
        Dosen::create([
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'no_telp'=> $request->no_telp

        ]);
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data Berhasil Disimpan!']);
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
            'no_telp'=> 'required'
        ]);
        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'no_telp'=> $request->no_telp
        ]);
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data Berhasil Diupdate!!']);
    }

    public function destroy(string $id):RedirectResponse
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with(['berhasil' => 'Data Berhasil Dihapus']);
    }
}
