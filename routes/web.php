<?php

use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KonsentrasiController;
use App\Http\Controllers\AgendaHomeController;
use App\Http\Controllers\StaffHomeController;
use App\Http\Controllers\DosenHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [AgendaHomeController::class, 'showDashboard']);
Route::get('/dosenhome', [DosenHomeController::class, 'index'])->name('dosen.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/staff', StaffController::class);
    Route::resource('/dosen', DosenController::class);
    Route::resource('/matkul', MatkulController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/ruangan', RuanganController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::resource('/agenda', AgendaController::class);
    Route::resource('/konsentrasi', KonsentrasiController::class);

});

Route::get('/staffhome', [StaffHomeController::class, 'showDashboard']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
