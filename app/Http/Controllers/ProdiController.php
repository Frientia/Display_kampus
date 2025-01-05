<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    
    public function index()
    {
        $prodi = Prodi::paginate(10); 
        return view('prodi.index', compact('prodi'));
    }

   
    public function create()
    {
        return view('prodi.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'id_prodi' => 'required|unique:prodi,id_prodi|max:255',
            'nama_prodi' => 'required|max:255',
        ], [
            'id_prodi.required' => 'ID Prodi wajib diisi.',
            'id_prodi.unique' => 'ID Prodi sudah digunakan.',
            'nama_prodi.required' => 'Nama Prodi wajib diisi.',
        ]);

        Prodi::create($request->only(['id_prodi', 'nama_prodi']));

        return redirect()->route('prodi.index')
                         ->with('success', 'Prodi berhasil ditambahkan.');
    }

    
    public function show($id_prodi)
    {
        $prodi = Prodi::findOrFail($id_prodi);
        return view('prodi.show', compact('prodi'));
    }
    
    
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

 
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'id_prodi' => 'required|max:255|unique:prodi,id_prodi,' . $prodi->id_prodi . ',id_prodi',
            'nama_prodi' => 'required|max:255',
        ], [
            'id_prodi.required' => 'ID Prodi wajib diisi.',
            'id_prodi.unique' => 'ID Prodi sudah digunakan.',
            'nama_prodi.required' => 'Nama Prodi wajib diisi.',
        ]);

        $prodi->update($request->only(['id_prodi', 'nama_prodi']));

        return redirect()->route('prodi.index')
                         ->with('success', 'Prodi berhasil diperbarui.');
    }

    public function destroy(Prodi $prodi)
    {
        try {
            $prodi->delete();

            return redirect()->route('prodi.index')
                             ->with('success', 'Prodi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('prodi.index')
                             ->with('error', 'Prodi gagal dihapus karena masih terkait dengan data lain.');
        }
    }
}
