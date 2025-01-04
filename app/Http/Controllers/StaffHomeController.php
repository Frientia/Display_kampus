<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffHomeController extends Controller
{
    public function showDashboard(Request $request)
    {
        // Ambil kategori/jabatan dari request
        $kategori = $request->get('kategori');

        // Query data staff dengan filter kategori (jika ada)
        $staff = Staff::when($kategori, function ($query, $kategori) {
                return $query->where('jabatan', $kategori);
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('staff', compact('staff', 'kategori'));
    }
}
