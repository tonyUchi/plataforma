<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MultiAuthController;

// --- RUTAS PÚBLICAS ---
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [MultiAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MultiAuthController::class, 'login']);

// --- RUTAS PROTEGIDAS ESTUDIANTES ---
Route::middleware(['auth:estudiante'])->group(function () {
    
    Route::get('/estudiante/dashboard', function () {
        return view('estudiante.dashboard');
    })->name('estudiante.dashboard');

    // ESTA ES LA RUTA QUE TE FALTABA Y POR LA QUE SALE EL ERROR:
    Route::post('/estudiante/logout', [MultiAuthController::class, 'logout'])
        ->name('estudiante.logout'); 
});

// --- RUTAS PROTEGIDAS DEPENDENCIAS ---
Route::middleware(['auth:dependencia'])->group(function () {
    
    Route::get('/dependencia/dashboard', function () {
        return view('dependencia.dashboard');
    })->name('dependencia.dashboard');

    Route::post('/dependencia/logout', [MultiAuthController::class, 'logout'])
        ->name('dependencia.logout');
});

// --- RUTAS PROTEGIDAS ADMIN (Web Guard) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});