<?php

namespace App\Providers;

use App\Domain\Contracts\Ports\Out\ICarRepository;
use App\Domain\Services\CarService;
use App\Infrastructure\Adapters\CarRepository;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ICarRepository::class, CarRepository::class);

        $this->app->singleton(CarService::class, function ($app) {
            return new CarService(
                $app->make(ICarRepository::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
