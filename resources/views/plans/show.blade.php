<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-inline justify-between">
            <h2 class="font-semibold text-xl text-gray-800">
                Planes
            </h2>

            <x-owns.link href="{{ route('plans.create') }}">Nuevo</x-owns.link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Detalle del plan "{{ $plan->title }}"
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{ Str::limit($plan->description, 32) }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 uppercase">
                                Título
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $plan->title }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 uppercase">
                                Tipo
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ Str::title($plan->type) }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 uppercase">
                                Modificado
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $plan->updated_at->diffForHumans() }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 uppercase">
                                Descripción
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $plan->description }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-3 text-right sm:px-6">
                            <x-owns.link href="{{ route('plans.edit', $plan) }}">Editar</x-owns.link>
                            <x-owns.link href="{{ route('plans.index') }}">Ir al listado</x-owns.link>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
