<?php

namespace App\Providers;

use App\Domain\Services\UserService;
use App\Infrastructure\Adapters\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(UserService::class, function ($app) {
        //     return new UserService($app->make(UserRepository::class));
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
