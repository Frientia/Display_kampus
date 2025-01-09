<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class AgendaHomeController extends Controller
{
    public function showDashboard()
    {
        $agendas = DB::table('agenda')
            ->select('nama_agenda', 'tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ambil 3 staff secara acak
        $staffs = Staff::inRandomOrder()->take(2)->get();

        return view('home', compact('agendas', 'staffs'));
    }

}
