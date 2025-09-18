<x-filament::section class="mt-0 mb-4">
    <x-slot name="heading">
        {{ __('filament-passkeys::passkeys.passkeys') }}
    </x-slot>

    <x-slot name="description">
        {{ __('filament-passkeys::passkeys.description') }}
    </x-slot>

    <livewire:filament-passkeys-standalone />
</x-filament::section>
