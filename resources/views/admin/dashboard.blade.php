<x-app-layout>
    <x-nav :title="'Dashboard Admin'" :links="[
        ['url' => route('admin.dashboard'), 'label' => 'Inicio'],
        ['url' => route('admin.solicitudes-servicio'), 'label' => 'Solicitudes de Servicio'],
        ['url' => route('admin.solicitudes-dependencias'), 'label' => 'Solicitudes de Dependencias'],
        ['url' => route('admin.solicitudes-revision'), 'label' => 'solicitudes de revisión de documentos'],
    ]"
    :logoutRoute="'admin.logout'"
    
     />

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido, {{ auth()->user()->name }}</h1>
            <p class="text-gray-600">Aquí encontrarás tus cursos, calificaciones y toda la información relevante.</p>
        </div>
    </div>
</x-app-layout>