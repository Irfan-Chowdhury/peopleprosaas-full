<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\SocialContract;
use App\Http\Controllers\Controller;
use App\Models\Landlord\Hero;
use App\Models\Landlord\Social;
use App\Services\SocialService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LandingPageController extends Controller
{

    public $languageId;
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->languageId = Session::has('TempSuperAdminLangId')==true ? Session::get('TempSuperAdminLangId') : Session::get('DefaultSuperAdminLangId');
            return $next($request);
        });
    }



    public function index(SocialService $socialService)
    {
        $socials = $socialService->getAll();
        $hero = Hero::where('language_id',1)->latest()->first();

        return view('landlord.public-section.landing_page.index',compact('socials','hero'));
    }
}
