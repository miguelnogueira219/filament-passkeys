<x-filament::section class="{{ $this->isSimple() ? 'mt-4' : 'mt-0 mb-4' }}">
    <x-slot name="heading">
        {{ __('Passkeys') }}
    </x-slot>

    <livewire:filament-passkeys :isSimple="$this->isSimple()" />
</x-filament::section>
