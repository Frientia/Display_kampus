<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->query('month');
        if ($month) {
            $agendas = Agenda::whereMonth('tanggal', Carbon::parse($month)->month)
                             ->whereYear('tanggal', Carbon::parse($month)->year)
                             ->get();
        } else {
            $agendas = Agenda::all();
        }

        $months = Agenda::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as month')
                        ->distinct()
                        ->pluck('month');

        return view('agenda', compact('agendas', 'months'));
    }
    
}
