@props(['title' => 'Dashboard', 'links' => [], 'logoutRoute'])

<nav x-data="{ open: false }" class="bg-blue-600 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center space-x-2">
            <img src="{{ asset('images/robot.png') }}" alt="Logo" class="h-10 w-10 rounded-full shadow-lg">
            <span class="font-bold text-lg">{{ $title }}</span>
        </div>

        <!-- Links desktop -->
        <div class="hidden md:flex space-x-6">
            @foreach($links as $link)
                <a href="{{ $link['url'] }}" class="hover:bg-blue-700 px-3 py-2 rounded-md font-medium">
                    {{ $link['label'] }}
                </a>
            @endforeach

            <!-- Botón logout -->
            <x-logout-button :route="$logoutRoute" />
        </div>

        <!-- Botón hamburguesa -->
        <div class="md:hidden">
            <button @click="open = !open" class="focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menú móvil -->
    <div x-show="open" class="md:hidden bg-blue-700 px-4 py-3 space-y-2">
        @foreach($links as $link)
            <a href="{{ $link['url'] }}" class="block px-3 py-2 rounded-md font-medium hover:bg-blue-800">
                {{ $link['label'] }}
            </a>
        @endforeach

        <!-- Botón logout en móvil -->
        <x-logout-button :route="$logoutRoute" />
    </div>
</nav>