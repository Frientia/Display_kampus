<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {

        // Data untuk chart (contoh data)
        $kehadiran_chart = [
            'Hadir' => $data_kehadiran['Hadir'] ?? 0,
            'Izin' => $data_kehadiran['Izin'] ?? 0,
            'Sakit' => $data_kehadiran['Sakit'] ?? 0,
            'Tanpa Keterangan' => $data_kehadiran['Tanpa Keterangan'] ?? 0,
        ];

        return view('dashboard', compact('kehadiran_chart'));
    }
    public function __construct()
    {
        $this->middleware('auth');

        return view('dashboard');
    }

}
