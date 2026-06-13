<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes | Servicio Social</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8 font-sans">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl border border-gray-100 overflow-hidden transform transition-all">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 sm:p-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Crea tu Cuenta de Estudiante
            </h2>
            <p class="text-blue-100 mt-2 text-sm sm:text-base">
                Regístro de Estudiantes
            </p>
        </div>

        <form action="{{ route('registro.estudiante') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Por favor, corrige los siguientes errores:</h3>
                            <ul class="mt-2 text-xs text-red-700 list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Datos Personales</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Nombre(s)</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Tu nombre" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Número de Control</label>
                        <input type="text" name="numero_control" value="{{ old('numero_control') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Ej. 19120045" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Primer apellido" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Apellido Materno</label>
                        <input type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Segundo apellido" required>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Datos Académicos</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="ejemplo@correo.com" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Campus / Plantel</label>
                            <input type="text" name="campus" value="{{ old('campus') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Nombre del campus" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Carrera</label>
                        <div class="relative">
                            <select name="carrera_id" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 appearance-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" required>
                                <option value="">-- Selecciona tu carrera --</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Seguridad</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Contraseña</label>
                        <input type="password" name="password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Mínimo 8 caracteres" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-1">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" placeholder="Repite tu contraseña" required>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 border-2 border-dashed border-slate-200 p-5 rounded-xl hover:bg-slate-100/50 transition duration-150">
                <label class="block text-sm font-bold text-slate-800 mb-1">Documento de Registro (Kárdex / Constancia)</label>
                <p class="text-xs text-slate-500 mb-3">Sube tu archivo en formato PDF para que el administrador valide tus créditos (Máximo 2MB).</p>
                <input type="file" name="documento_registro" accept="application/pdf" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition duration-150 transform active:scale-[0.98]">
                    Registrarse en la Plataforma
                </button>
            </div>

            <div class="text-center pt-2">
                <p class="text-sm text-gray-500">
                    ¿Ya tienes una cuenta creada? 
                    <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-700 hover:underline transition duration-150">
                        Inicia sesión aquí
                    </a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>