<?php

declare(strict_types=1);

use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\LandLord\LandingPageController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
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





