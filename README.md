# Filament Passkeys

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marcelweidum/filament-passkeys.svg?style=flat-square)](https://packagist.org/packages/marcelweidum/filament-passkeys)
[![Total Downloads](https://img.shields.io/packagist/dt/marcelweidum/filament-passkeys.svg?style=flat-square)](https://packagist.org/packages/marcelweidum/filament-passkeys)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/marcelweidum/filament-passkeys/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/marcelweidum/filament-passkeys/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/marcelweidum/filament-passkeys/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/marcelweidum/filament-passkeys/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)

Use passkeys in your filamentphp app.

## Installation

1. Install the package via composer:

```bash
composer require marcelweidum/filament-passkeys
```

2. Add the package's interface and trait to your user model

```php
namespace App\Models;

use Spatie\LaravelPasskeys\Models\Concerns\HasPasskeys;
use Spatie\LaravelPasskeys\Models\Concerns\InteractsWithPasskeys;
// ...

class User extends Authenticatable implements HasPasskeys
{
    use HasFactory, Notifiable, InteractsWithPasskeys;

    // ... 
}
```

3. Publish and run the migrations

```bash
php artisan vendor:publish --tag="passkeys-migrations"
php artisan migrate
```

4. Add the package provided routes

```php
// routes/web.php
Route::passkeys();
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [MarcelWeidum](https://github.com/MarcelWeidum)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
