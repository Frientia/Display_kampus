<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StaffHomeController extends Controller
{
    public function showDashboard()
    {
        $agendas = DB::table('agenda')
            ->select('nama_agenda', 'tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('staff', compact('agendas'));
    }
}
