<?php

namespace App\Providers;

use App\Repositories\ThermostatRepository;
use App\Repositories\ThermostatRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ThermostatRepositoryInterface::class,
            ThermostatRepository::class
        );
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
