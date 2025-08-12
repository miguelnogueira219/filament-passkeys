<?php

declare(strict_types=1);

namespace MarcelWeidum\Passkeys\Livewire;

use Illuminate\View\View;
use Spatie\LaravelPasskeys\Livewire\PasskeysComponent;

final class Passkeys extends PasskeysComponent
{
    public function render(): View
    {
        return view('filament-passkeys::livewire.passkeys', data: [
            'passkeys' => $this->currentUser()->passkeys,
        ]);
    }
}
