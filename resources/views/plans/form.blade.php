<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">

            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="title">Título del plan</x-label>

                <x-input id="title" type="text" name="title" :value="old('title', $plan->title)" required autofocus />
            </div>

            <!-- Type -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="type">Tipo</x-label>

                <x-owns.select name="type" :options="trans('plans.types')" :relatedData="$plan->type"/>
            </div>

            <!-- Description -->
            <div class="col-span-6 ">
                <x-label for="description">Descripción</x-label>

                <div class="">
                    <x-owns.textarea name="description" :oldData="old('description', $plan->description)"/>

                    <p class="mt-2 text-sm text-gray-500">
                        Breve descripción acerca del plan
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-button>Guardar</x-button>
        <x-owns.link href="{{ url()->previous() }}">Cancelar</x-owns.link>
    </div>
</div>
