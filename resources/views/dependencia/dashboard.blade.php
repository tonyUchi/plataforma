<x-app-layout>
    <x-nav :title="'Dashboard Dependencia'" :links="[
        ['url' => route('dependencia.dashboard'), 'label' => 'Inicio'],
        ['url' => route('dependencia.registrar'), 'label' => 'Registrar Programas'],
        ['url' => route('dependencia.manual'), 'label' => 'Manual de Usuario'],
        ['url' => route('dependencia.prestadores'), 'label' => 'Prestadores a cargo'],
    ]"
    :logoutRoute="'dependencia.logout'"
    
     />

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido, {{ auth()->guard('dependencia')->user()->nombre_responsable }}</h1>
            <p class="text-gray-600">Aquí encontrarás tus cursos, calificaciones y toda la información relevante.</p>
        </div>
    </div>
</x-app-layout>