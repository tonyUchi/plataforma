<x-app-layout>
    <x-nav :title="'Dashboard Estudiante'" :links="[
        ['url' => route('estudiante.dashboard'), 'label' => 'Inicio'],
        ['url' => route('estudiante.evaluaciones'), 'label' => 'Evaluaciones / Reportes'],
        ['url' => route('estudiante.manual'), 'label' => 'Manual de Usuario'],
        ['url' => route('estudiante.perfil'), 'label' => 'Mis Datos'],
    ]"
    :logoutRoute="'estudiante.logout'"
    
     />

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido, {{ auth()->user()->nombre }}</h1>
            <p class="text-gray-600">Aquí encontrarás tus cursos, calificaciones y toda la información relevante.</p>
        </div>
    </div>
</x-app-layout>