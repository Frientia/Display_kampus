<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'DESC')->get();
        return view('dosen', compact('dosen'));
    }
}
