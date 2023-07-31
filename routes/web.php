<?php

declare(strict_types=1);

use App\Http\Controllers\Landlord\LandingPageController;
use App\Http\Controllers\Landlord\DashboardController;
use App\Http\Controllers\Landlord\LanguageController;
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

Route::prefix('super-admin')->group(function () {
    Route::get('dashboard',[DashboardController::class, 'index']);

    Route::prefix('languages')->group(function () {
        Route::controller(LanguageController::class)->group(function () {
            Route::get('/', 'index')->name('language.index');
            Route::post('/store', 'store')->name('language.store')->middleware('demoCheck');
            Route::get('/edit/{language}', 'edit')->name('language.edit');
            Route::post('/update/{language}', 'update')->name('language.update')->middleware('demoCheck');
            Route::get('/destroy/{language}', 'destroy')->name('language.destroy')->middleware('demoCheck');
        });
    });
});








