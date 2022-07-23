<?php
declare(strict_types=1);

namespace App\Providers;

use Core\BoundedContext\Course\Domain\CourseRepositoryContract;
use Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent\CourseRepository;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->bind(CourseRepositoryContract::class,CourseRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
