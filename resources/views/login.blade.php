<div x-data>
    <x-filament::button
        type="button"
        icon="heroicon-o-key"
        color="gray"
        class="w-full"
        x-on:click="window.FilamentPasskeys.login(@js(filament()->getCurrentOrDefaultPanel()->getUrl()))"
    >
        {{ __('filament-passkeys::passkeys.authenticate_using_passkey') }}
    </x-filament::button>
</div>
