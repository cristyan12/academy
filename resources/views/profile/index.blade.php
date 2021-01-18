<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-inline justify-between">
            <h2 class="font-semibold text-xl text-gray-800">
                Usuarios
            </h2>

            <x-owns.link href="{{ route('profile.create') }}">Perfil del usuario</x-link>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:profile.users-list />
            </div>
        </div>
    </div>
</x-app-layout>