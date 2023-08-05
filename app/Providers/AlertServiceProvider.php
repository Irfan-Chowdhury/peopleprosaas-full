<?php

namespace App\Providers;

use App\Services\AlertService;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('alert', AlertService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
