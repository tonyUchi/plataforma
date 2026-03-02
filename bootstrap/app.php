<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // 1. Redirección personalizada si el usuario NO está logueado
        $middleware->redirectGuestsTo(fn () => route('login'));

        // 2. Redirección personalizada si el usuario YA está logueado (Sustituye al antiguo RedirectIfAuthenticated)
        $middleware->redirectUsersTo(function () {
            if (auth('estudiante')->check()) {
                return '/estudiante/dashboard';
            }
            if (auth('dependencia')->check()) {
                return '/dependencia/dashboard';
            }
            return '/admin/dashboard'; // Por defecto para el guard 'web' (Admin)
        });

         // 3. Registrar alias de middleware (Opcional, pero recomendado por claridad)
        /*
         $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            // Si creaste middlewares personalizados, regístralos aquí
        ]);
        */
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
