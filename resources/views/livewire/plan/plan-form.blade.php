<div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="save">
        @csrf

        @include('livewire.plan._fields')
    </form>
</div>
