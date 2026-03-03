<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Elije tu tipo de usuario</label>
            <select name="tipo_usuario" id="tipo_usuario" onchange="actualizarPlaceholder()"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="admin">Administrador</option>
                <option value="estudiante" selected>Estudiante</option>
                <option value="dependencia">Dependencia/Empresa</option>
            </select>
        </div>

        <div>
            <label id="label_identificacion" for="login_field"
                class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
            <input type="text" name="login_field" id="login_field" required
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="ejemplo@correo.com">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
            <input type="password" name="password" id="password" required
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Entrar
            </button>
        </div>
    </form>

    <script>
    function actualizarPlaceholder() {
        const tipo = document.getElementById('tipo_usuario').value;
        const label = document.getElementById('label_identificacion');
        const input = document.getElementById('login_field');

        if (tipo === 'admin') {
            label.innerText = 'Correo Electrónico';
            input.placeholder = 'ejemplo@correo.com';
        } else if (tipo === 'estudiante') {
            label.innerText = 'Número de Control';
            input.placeholder = '20210543';
        } else {
            label.innerText = 'RFC de la Empresa';
            input.placeholder = 'ABC123456XYZ';
        }
    }

    // Ejecutar al cargar la página
    window.onload = actualizarPlaceholder;
</script>
</x-guest-layout>