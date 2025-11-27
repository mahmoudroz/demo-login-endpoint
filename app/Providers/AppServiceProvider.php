<?php

namespace App\Providers;

use App\Services\Login\LoginService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Login\LoginInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            LoginInterface::class,
            LoginService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
