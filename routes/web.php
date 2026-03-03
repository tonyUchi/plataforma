<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MultiAuthController;

// --- RUTAS PÚBLICAS ---
Route::get('/', function () {
    return view('bienvenida');
});


Route::get('/login', [MultiAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MultiAuthController::class, 'login']);

// --- RUTAS PROTEGIDAS ESTUDIANTES ---
Route::middleware(['auth:estudiante'])->group(function () {

    Route::get('/estudiante/dashboard', function () {
        return view('estudiante.dashboard');
    })->name('estudiante.dashboard');

    // Evaluaciones / Reportes
    Route::get('/estudiante/evaluaciones', function () {
        return view('estudiantes.evaluaciones');
    })->name('estudiante.evaluaciones');

    // Manual de Usuario
    Route::get('/estudiante/manual', function () {
        return view('estudiantes.manual');
    })->name('estudiante.manual');

    // Mis Datos
    Route::get('/estudiante/perfil', function () {
        return view('estudiantes.perfil');
    })->name('estudiante.perfil');


    // ESTA ES LA RUTA QUE TE FALTABA Y POR LA QUE SALE EL ERROR:
    Route::post('/estudiante/logout', [MultiAuthController::class, 'logout'])
        ->name('estudiante.logout');
});

// --- RUTAS PROTEGIDAS DEPENDENCIAS ---
Route::middleware(['auth:dependencia'])->group(function () {

    Route::get('/dependencia/dashboard', function () {
        return view('dependencia.dashboard');
    })->name('dependencia.dashboard');

     // Evaluaciones / Reportes
    Route::get('/dependencia/registrar', function () {
        return view('dependencia.registrar');
    })->name('dependencia.registrar');

    // Manual de Usuario
    Route::get('/dependencia/manual', function () {
        return view('dependencia.manual');
    })->name('dependencia.manual');

    // Mis Datos
    Route::get('/dependencia/prestadores', function () {
        return view('dependencia.prestadores');
    })->name('dependencia.prestadores');

    Route::post('/dependencia/logout', [MultiAuthController::class, 'logout'])
        ->name('dependencia.logout');
});

// --- RUTAS PROTEGIDAS ADMIN (Web Guard) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

     // Evaluaciones / Reportes
    Route::get('/admin/solicitudes-servicio', function () {
        return view('admin.solicitudes-servicio');
    })->name('admin.solicitudes-servicio');

    // Manual de Usuario
    Route::get('/admin/solicitudes-dependencias', function () {
        return view('admin.solicitudes-dependencias');
    })->name('admin.solicitudes-dependencias');

    // Mis Datos
    Route::get('/admin/solicitudes-revision', function () {
        return view('admin.solicitudes-revision');
    })->name('admin.solicitudes-revision');

    Route::post('/admin/logout', [MultiAuthController::class, 'logout'])
        ->name('admin.logout');
});

