# Upgrade guide: 3.x to Laravel native passkeys

Version 3.x used `spatie/laravel-passkeys`. The native Laravel version uses `laravel/passkeys` instead. Follow this guide when upgrading an existing application that already has 3.x installed.

## Before upgrading

Back up your database before running the migration. Existing passkeys are converted in place in the `passkeys` table.

The upgrade migration expects the existing Spatie table shape, including the `authenticatable_id` and `data` columns. It adds Laravel's native `user_id` and `credential` columns and keeps the old columns in place.

## 1. Update Composer dependencies

Update this package to the native Laravel passkeys version:

```bash
composer require marcelweidum/filament-passkeys
```

If your application requires `spatie/laravel-passkeys` directly, remove it after the package update:

```bash
composer remove spatie/laravel-passkeys web-auth/webauthn-lib
```

Do not remove those packages if another dependency in your application still needs them.

## 2. Update your user model

Replace the Spatie interface and trait:

```php
use Spatie\LaravelPasskeys\Models\Concerns\HasPasskeys;
use Spatie\LaravelPasskeys\Models\Concerns\InteractsWithPasskeys;

class User extends Authenticatable implements HasPasskeys
{
    use HasFactory, Notifiable, InteractsWithPasskeys;
}
```

With Laravel's native interface and trait:

```php
use Laravel\Passkeys\Contracts\PasskeyUser;
use Laravel\Passkeys\PasskeyAuthenticatable;

class User extends Authenticatable implements PasskeyUser
{
    use HasFactory, Notifiable, PasskeyAuthenticatable;
}
```

## 3. Remove the Spatie passkey routes

Remove the Spatie route registration from your application routes:

```php
Route::passkeys();
```

Laravel registers the native passkey routes automatically.

## 4. Publish and run this package's upgrade migration

For applications that already have Spatie-backed passkeys, publish this package's migration tag:

```bash
php artisan vendor:publish --tag="filament-passkeys-migrations"
php artisan migrate
```

Do not run Laravel's fresh `create_passkeys_table` migration against an existing Spatie `passkeys` table. Use the upgrade migration above instead.

The migration will:

- add a nullable `user_id` column;
- add a nullable `credential` JSON column;
- copy each Spatie `authenticatable_id` value into `user_id`;
- copy Spatie's stored credential JSON from `data` into `credential`;
- set `credential_id` from the stored `publicKeyCredentialId`;
- add the native indexes expected by Laravel.

## 5. Optional: publish Laravel's passkeys config

If you need to customize Laravel's native passkeys configuration, publish it:

```bash
php artisan vendor:publish --tag="passkeys-config"
```

## 6. Verify the upgrade

After migrating, verify that existing users can:

- log in with an existing passkey;
- create a new passkey from the Filament profile page;
- delete a passkey from the Filament profile page.

If passkey creation fails, confirm that `APP_URL` matches the domain used in the browser.
