<?php

declare(strict_types=1);

namespace MarcelWeidum\Passkeys;

use Illuminate\Filesystem\Filesystem;
use MarcelWeidum\Passkeys\Commands\PasskeysCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class PasskeysServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-passkeys';

    public static string $viewNamespace = 'filament-passkeys';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(self::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('marcelweidum/filament-passkeys');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(self::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__.'/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-passkeys/{$file->getFilename()}"),
                ], 'filament-passkeys-stubs');
            }
        }
    }

    protected function getAssetPackageName(): string
    {
        return 'marcelweidum/filament-passkeys';
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            PasskeysCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-passkeys_table',
        ];
    }
}
