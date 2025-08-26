<div>
    <div>
        <form id="passkeyForm" wire:submit="validatePasskeyProperties" class="flex items-start space-x-2">
            <div class="w-full">
                <x-filament::input.wrapper prefix="Name">
                    <x-filament::input
                        type="text"
                        wire:model="name"
                        label="Name"
                    />
                </x-filament::input.wrapper>

                @error('name')
                    <span class="mt-1 text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-filament::button type="submit">
                {{ __('passkeys::passkeys.create') }}
            </x-filament::button>
        </form>
    </div>

    @if($passkeys)
        <div class="mt-6">
            <span class="font-bold text-sm">Passkeys</span>
            <ul class="space-y-4">
                @foreach($passkeys as $passkey)
                    <x-filament::fieldset class="mt-2">
                        <div class="flex items-center">
                            <div class="mr-2 flex flex-col">
                                <span>{{ $passkey->name }}</span>
                                <span class="text-xs text-gray-400">{{ __('passkeys::passkeys.last_used') }}: {{ $passkey->last_used_at?->diffForHumans() ?? __('passkeys::passkeys.not_used_yet') }}</span>
                            </div>

                            <div class="ml-auto">
                                {{ ($this->deleteAction)(['passkey' => $passkey->id]) }}
                            </div>
                        </div>
                    </x-filament::fieldset>
                @endforeach
            </ul>
        </div>
    @endif

    <x-filament-actions::modals />
</div>

@include('passkeys::livewire.partials.createScript')
