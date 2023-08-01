<?php

namespace App\Providers;

use App\Contracts\BaseContract;
use App\Contracts\LanguageContract;
use App\Repositories\BaseRepository;
use App\Repositories\LanguageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LanguageContract::class, LanguageRepository::class);
        $this->app->bind(BaseContract::class, BaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
