<?php

declare(strict_types=1);

namespace MarcelWeidum\Passkeys\Forms\Components;

use Filament\Forms\Components\ViewField;

/**
 * A reusable Filament form component to render the Passkeys UI anywhere, usually in a form schema.
 * Useful if you have a custom profile page. Otherwise, you don't need to use this.
 */
final class PasskeyProfileComponent extends ViewField
{
    protected string $view = 'filament-passkeys::components.passkey-profile-component';

    public static function create(): static
    {
        return static::make('passkeys');
    }
}
