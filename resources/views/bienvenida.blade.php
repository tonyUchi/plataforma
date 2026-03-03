<!-- resources/views/bienvenida.blade.php -->
<!DOCTYPE html>
<html lang="es" x-data="bienvenida">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/robot.ico') }}" type="image/x-icon">
    <title>Sistema Automatizado del Servicio Social</title>
    @vite(['resources/css/app.css', 'resources/js/bienvenida.js'])
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
    <div class="text-center bg-white p-10 rounded-lg shadow-lg max-w-2xl w-full animate-fade-in">
        
        <!-- Robot con animación -->
    <img src="{{ asset('images/robot.png') }}" 
     alt="Robot Mascota" 
     class="mx-auto w-32 h-32 rounded-full shadow-md mb-4 transform transition duration-700"
     :class="animar ? 'scale-110' : 'scale-90'">

        
        <!-- Título -->
        <h1 class="text-2xl font-bold text-blue-700 mb-2">Sistema Automatizado del Servicio Social</h1>
        
        <!-- Mensaje -->
        <p class="text-gray-600 mb-8">Bienvenido!, inicia sesión para continuar.</p>
        
        <!-- Botón único -->
        <a href="{{ route('login') }}" 
           class="inline-block bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 text-white py-2 px-6 rounded transition">
           Iniciar Sesión
        </a>
    </div>
</body>
</html>