<?php

declare(strict_types=1);

use App\Http\Controllers\Landlord\AdminController;
use App\Http\Controllers\Landlord\LandingPageController;
use App\Http\Controllers\Landlord\DashboardController;
use App\Http\Controllers\Landlord\FeatureController;
use App\Http\Controllers\Landlord\LanguageController;
use App\Http\Controllers\Landlord\SocialController;
use App\Http\Controllers\Landlord\TranslationController;
use App\Http\Controllers\LanguageSettingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Landlord Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

// Route::get('/', function () {
//     return 'This is Landlord Section - web.php';
// });

// Route::get('/', 'LandingPageController@index');


Route::get('/', [LandingPageController::class, 'index']);
Route::get('/super-admin', [AdminController::class, 'showLoginForm'])->name('landlord.login')->middleware('guest');
Route::post('/super-admin', [AdminController::class, 'login'])->name('landlord.login.proccess');
Route::post('/super-admin/logout', [AdminController::class, 'logout'])->name('landlord.logout');

Route::middleware('auth')->group(function () {
    Route::prefix('super-admin')->group(function () {
        Route::get('dashboard',[DashboardController::class, 'index'])->name('landlord.dashboard');

        Route::prefix('languages')->group(function () {
            Route::controller(LanguageController::class)->group(function () {
                Route::get('/', 'index')->name('language.index');
                Route::get('/datatable', 'datatable')->name('language.datatable');
                Route::post('/store', 'store')->name('language.store')->middleware('demoCheck');
                Route::get('/edit/{language}', 'edit')->name('language.edit');
                Route::post('/update/{language}', 'update')->name('language.update')->middleware('demoCheck');
                Route::get('/destroy/{language}', 'destroy')->name('language.destroy')->middleware('demoCheck');
            });

            // Translation
            Route::controller(TranslationController::class)->group(function () {
                Route::get('/{language}/translations', 'index')->name('lang.translations.index');
                Route::get('/{language}/translations/create', 'create')->name('lang.translations.create');
                Route::post('/{language}/translations/store', 'store')->name('lang.translations.store');

                Route::post('/update', 'update')->name('lang.translations.update');
                // Route::get('/create', 'create')->name('languages.create');
                // Route::post('/store', 'store')->name('languages.store');
                Route::get('/switch/{lang}', 'languageSwitch')->name('lang.switch');
                Route::get('/delete', 'languageDelete')->name('lang.delete');
            });
        });

        Route::prefix('socials')->group(function () {
            Route::controller(SocialController::class)->group(function () {
                Route::get('/', 'index')->name('social.index');
                Route::post('/store', 'store')->name('social.store')->middleware('demoCheck');
                Route::get('/edit/{social}', 'edit')->name('social.edit');
                Route::post('/update/{social}', 'update')->name('social.update')->middleware('demoCheck');
                Route::get('/destroy/{social}', 'destroy')->name('social.destroy')->middleware('demoCheck');
                Route::post('/sort', 'sort')->name('social.sort')->middleware('demoCheck');
            });
        });

        Route::prefix('features')->group(function () {
            Route::controller(FeatureController::class)->group(function () {
                Route::get('/', 'index')->name('feature.index');
                Route::get('/datatable', 'datatable')->name('feature.datatable');
                Route::post('/store', 'store')->name('feature.store')->middleware('demoCheck');
                Route::get('/edit/{feature}', 'edit')->name('feature.edit');
                Route::post('/update/{feature}', 'update')->name('feature.update')->middleware('demoCheck');
                Route::get('/destroy/{feature}', 'destroy')->name('feature.destroy')->middleware('demoCheck');
                Route::post('/sort', 'sort')->name('feature.sort')->middleware('demoCheck');
            });
        });
    });
});







