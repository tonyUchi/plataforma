<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-center text-white">
        <div class="inline-block bg-white/10 backdrop-blur-md px-3 py-1 rounded-lg text-sm font-black tracking-widest mb-2 select-none animate-pulse">
            SASS
        </div>
        <h2 class="text-xl font-bold tracking-tight">Sistema Automatizado de Servicio Social</h2>
        <p class="text-blue-100 text-xs mt-1">Introduce tus credenciales para acceder al panel</p>
    </div>

    <div class="px-6 sm:px-8 pt-4">
        <x-auth-session-status class="mb-2" :status="session('status')" />
    </div>

    <form method="POST" action="{{ route('login') }}" class="p-6 sm:p-8 space-y-5 bg-white">
        @csrf

        <div class="space-y-1.5">
            <label class="text-xs font-bold uppercase tracking-wider text-slate-500">Elije tu tipo de usuario</label>
            <div class="relative">
                <select name="tipo_usuario" id="tipo_usuario" onchange="actualizarPlaceholder()"
                    class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 block p-3 appearance-none transition duration-150 ease-in-out cursor-pointer font-medium">
                    <option value="admin">Administrador</option>
                    <option value="estudiante" selected>Estudiante</option>
                    <option value="dependencia">Dependencia/Empresa</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="space-y-1.5">
            <label id="label_identificacion" for="login_field"
                class="text-xs font-bold uppercase tracking-wider text-slate-500">Correo Electrónico</label>
            <input type="text" name="login_field" id="login_field" required
                class="w-full bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl p-3 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition duration-150 ease-in-out"
                placeholder="ejemplo@correo.com">
        </div>

        <div class="space-y-1.5">
            <div class="flex justify-between items-center">
                <label for="password" class="text-xs font-bold uppercase tracking-wider text-slate-500">Contraseña</label>
                <a href="#" class="text-xs text-blue-600 hover:underline font-medium">¿La olvidaste?</a>
            </div>
            <input type="password" name="password" id="password" required
                class="w-full bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl p-3 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition duration-150 ease-in-out">
        </div>

        <div class="pt-2">
            <button type="submit"
                class="w-full flex justify-center items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition duration-150 transform active:scale-[0.98] tracking-wide text-sm">
                <span>Entrar</span>
                <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14" />
                </svg>
            </button>
        </div>

        <div class="text-center pt-2 border-t border-slate-100 text-xs text-slate-400">
                ¿Aún no tienes cuenta? <a href="#" class="text-blue-500 font-semibold hover:underline">Regístrate aquí</a>
            </div>
    </form>
</div>

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