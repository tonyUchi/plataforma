<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | Sistema de Servicio Social</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans flex flex-col md:flex-row">

    <div class="hidden md:flex md:w-1/2 lg:w-3/5 bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-800 p-12 flex-col justify-between relative overflow-hidden">
        
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="flex items-center space-x-2 text-white/90 z-10">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-5.824-3 Carltona12.083 12.083 0 01.665-6.48l6.16 3.421z" />
            </svg>
            <span class="font-bold tracking-wider text-sm uppercase">Panel Institucional</span>
        </div>

        <div class="max-w-xl my-auto space-y-4 z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-none">
                El puente hacia tu <br><span class="text-blue-200">futuro profesional.</span>
            </h1>
            <p class="text-lg text-blue-100/90 leading-relaxed">
                Vincula tus conocimientos académicos con el entorno laboral. Gestiona, aplica y libera tu Servicio Social en un solo lugar de manera ágil y transparente.
            </p>
        </div>

        <div class="text-xs text-blue-200/70 z-10">
            &copy; {{ date('Y') }} Plataforma de Gestión de Servicio Social. Todos los derechos reservados.
        </div>
    </div>

    <div class="flex-1 flex flex-col justify-center items-center p-8 sm:p-12 bg-slate-50 md:bg-white">
        
        <div class="w-full max-w-md space-y-8 bg-white p-8 md:p-0 rounded-2xl md:rounded-none shadow-xl md:shadow-none border border-gray-100 md:border-none">
            
            <div class="text-center md:text-left">
                <!-- Logotipo SASS Animado con Puro CSS -->
<div class="flex items-center justify-center md:justify-start space-x-2 mb-6 select-none">
    <!-- El contenedor brilla y pulsa suavemente -->
    <div class="relative flex items-center justify-center bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-black text-2xl px-4 py-1.5 rounded-xl shadow-md animate-pulse">
        SASS
        <!-- Un pequeño destello decorativo -->
        <span class="absolute -top-1 -right-1 flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
        </span>
    </div>
    <!-- Texto secundario elegante -->
    <span class="text-xs font-bold uppercase tracking-widest text-slate-400 pl-1">
        v2.0
    </span>
</div>
                
                <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">
                    Sistema Automatizado del Servicio Social
                </h2>
                <p class="mt-2 text-sm text-gray-500">
                    Bienvenido, por favor inicia sesión para continuar a la plataforma.
                </p>
            </div>

            <div class="pt-2">
                <a href="{{ route('login') }}" class="flex w-full justify-center items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-md hover:shadow-lg transition duration-150 transform active:scale-[0.99] tracking-wide">
                    <span>Iniciar Sesión</span>
                    <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <div class="border-t border-gray-100 pt-6">
                <div class="flex justify-between text-xs text-gray-400">
                    <span>¿Necesitas ayuda? <a href="#" class="text-blue-500 hover:underline">Soporte</a></span>
                    <span>v2.0</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>