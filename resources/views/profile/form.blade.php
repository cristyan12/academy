<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <!-- User's Name -->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="name">Nombre</x-label>

                <x-input id="name" type="text" name="name" :value="old('name', $user->name)" disabled />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="email">Correo electrónico</x-label>

                <x-input id="email" type="text" name="email" :value="old('email', $user->email)" disabled />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="phone">Número de teléfono</x-label>

                <x-input id="phone" type="text" name="phone" :value="old('phone', $user->profile->phone)" required />
            </div>

            <!-- Born at -->
            <div class="col-span-6 sm:col-span-3">
                <x-label for="born_at">Fecha de nacimiento</x-label>

                <x-input id="born_at" type="date" name="born_at" :value="old('born_at', $user->profile->born_at->format('Y-m-d'))" required />
            </div>

            <!-- Countries -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="country">País</x-label>

                <x-select name="country" id="country">
                    <option>-</option>
                    @foreach(trans('profiles.countries') as $country)
                        <option value="{{ $country }}"{{ old('country', $user->profile->country) == $country ? ' selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <!-- Plans -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="plan_id">Plan de estudio</x-label>

                <x-owns.select name="plan_id" field="title" :options="$plans" :relatedData="$user->profile->plan_id"/>
            </div>
        </div>
    </div>

{{-- @foreach($plans as $plan)
<option value="{{ $plan->id }}"{{ old('plan_id', $user->profile->plan_id) === $plan->id ? ' selected' : '' }}>
{{ $plan->title }}
</option>
@endforeach --}}

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-button>Guardar</x-button>
        <x-owns.link href="{{ url()->previous() }}">Cancelar</x-owns.link>
    </div>
</div>
