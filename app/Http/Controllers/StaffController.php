<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Redirect;


class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('created_at', 'DESC')->paginate(5);
        return view('staff.index', compact('staff'));
    }
    public function create()
    {
        return view('staff.create');
    }
    public function store(Request $request):RedirectResponse
    {
        //validate form
        $request->validate([
           
            'id_staff' => 'required',
            'nama_staff' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required|numeric',
        ]);

        Staff::create([
            'id_staff' => $request->id_staff,
            'nama_staff' => $request->nama_staff,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
         
        ]);
        return redirect()->route('staff.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id):View 
    {
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
    }
    public function update(Request $request, string $id ):RedirectResponse
    {
        $request->validate([
            'id_staff' => 'required',
            'nama_staff' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update([
            'id_staff' => $request->id_staff,
            'nama_staff' => $request->nama_staff,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp
        ]);
        return redirect()->route('staff.index')->with(['success' => 'Data berhasil diupdate!!']);
    }

    public function destroy(string $id):RedirectResponse
    {
        $staff = staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staff.index')->with(['success' => 'Data berhasil dihapus']);
    }
    
}
