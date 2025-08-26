<x-authenticate-passkey redirect="/admin">
    <x-filament::button icon="heroicon-o-key" color="gray" class="w-full" onclick="authenticateWithPasskey()">
        {{ __('passkeys::passkeys.authenticate_using_passkey') }}
    </x-filament::button>
</x-authenticate-passkey>
