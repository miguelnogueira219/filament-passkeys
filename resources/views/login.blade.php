<x-authenticate-passkey redirect="/admin">
    <x-filament::button icon="heroicon-o-key" color="gray" class="w-full" onclick="authenticateWithPasskey()">
        Authenticate using Passkey
    </x-filament::button>
</x-authenticate-passkey>
