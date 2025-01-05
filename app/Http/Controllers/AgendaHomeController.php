<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AgendaHomeController extends Controller
{
    public function showDashboard()
    {
        $agendas = DB::table('agenda')
            ->select('nama_agenda', 'tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('home', compact('agendas'));
    }
}
