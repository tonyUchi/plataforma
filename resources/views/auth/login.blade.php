<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>¿Quién eres?</label>
    <select name="tipo_usuario" id="tipo_usuario" onchange="actualizarPlaceholder()">
        <option value="admin">Administrador</option>
        <option value="estudiante">Estudiante</option>
        <option value="dependencia">Dependencia/Empresa</option>
    </select>

    <label id="label_identificacion">Correo Electrónico</label>
    <input type="text" name="login_field" id="login_field" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit">Entrar</button>
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
</script>
</x-guest-layout>
