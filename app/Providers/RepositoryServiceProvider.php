<?php

namespace App\Providers;

use App\Contracts\BaseContract;
use App\Contracts\FeatureContract;
use App\Contracts\GeneralSettingContract;
use App\Contracts\LanguageContract;
use App\Contracts\SocialContract;
use App\Repositories\BaseRepository;
use App\Repositories\FeatureRepository;
use App\Repositories\GeneralSettingRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\SocialRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseContract::class, BaseRepository::class);
        $this->app->bind(LanguageContract::class, LanguageRepository::class);
        $this->app->bind(SocialContract::class, SocialRepository::class);
        $this->app->bind(FeatureContract::class, FeatureRepository::class);
        $this->app->bind(GeneralSettingContract::class, GeneralSettingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
