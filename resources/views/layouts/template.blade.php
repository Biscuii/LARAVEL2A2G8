<x-app-layout>
    <x-slot name="header">
        <!-- Contenu du header -->
    </x-slot>

    <x-slot name="content">
        <!-- Contenu spécifique à chaque vue -->
        @yield('content')
    </x-slot>
</x-app-layout>
