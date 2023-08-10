<?php

namespace App\Http\Middleware;

use App\Models\Landlord\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $languageId = Session::has('TempSuperAdminLangId')==true ? Session::get('TempSuperAdminLangId') : Session::get('DefaultSuperAdminLangId');
        $locale = Language::find($languageId)->locale;
        App::setLocale($locale);
        return $next($request);
    }
}
