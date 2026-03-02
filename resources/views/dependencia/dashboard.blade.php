<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard de Dependencia</h1>
    <p>Bienvenido al panel de dependencia del sistema {{ auth()->user()->name }}.</p>
    <form action="{{ route('dependencia.logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    
</body>
</html>