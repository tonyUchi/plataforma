@props(['route'])

<form method="POST" action="{{ route($route) }}">
    @csrf
    <button type="submit" 
        class="hover:bg-red-600 px-3 py-2 rounded-md font-medium bg-red-500 w-full md:w-auto text-left md:text-center">
        Cerrar sesión
    </button>
</form>