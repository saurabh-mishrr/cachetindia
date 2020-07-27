<?php

namespace App\Providers;

use Repositories\FileTrailRepository;
use Interfaces\FileTrailRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            FileTrailRepositoryInterface::class,
            FileTrailRepository::class
        );
    }
}
