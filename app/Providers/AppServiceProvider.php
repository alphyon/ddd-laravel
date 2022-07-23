<?php

declare(strict_types=1);

namespace App\Providers;

use Core\Shared\Domain\UuidGeneratorContract;
use Core\Shared\Infrastructure\UuidGenerator;
use File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UuidGeneratorContract::class,UuidGenerator::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(File::allFiles(base_path('src/BoundedContext/**/Infrastructure/migrations')));
    }
}
