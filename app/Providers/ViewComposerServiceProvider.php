<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        // Procedure - 1
        // $general_settings = GeneralSetting::latest()->first();

        // view()->composer('layout.main_partials.header', function ($view) use ($generalSetting) {
        //     $view->with('generalSetting', $generalSetting);
        // });



        // $general_settings = GeneralSetting::latest()->first();

        // Procedure - 2
        // view()->composer([
        //     // 'layout.main',
        //     // 'layout.main_partials.header',
        //     // 'layout.main_partials.footer',
        //     // 'projects.invoices.show',
        //     // 'dashboard',
        //     // 'layout.client',
        //     // 'frontend.Layout.navigation',
        //     // 'documentation.index',
        //     // 'vendor.translation.layout'
        // ], function ($view) use ($general_settings) {
        //     $view->with('general_settings', $general_settings);
        // });
    }
}



