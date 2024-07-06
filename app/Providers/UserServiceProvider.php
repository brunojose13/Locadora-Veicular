<?php

namespace App\Providers;

use App\Domain\Ports\User\IUserRepository;
use App\Domain\Services\UserService;
use App\Infrastructure\Adapters\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService($app->make(IUserRepository::class));
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
