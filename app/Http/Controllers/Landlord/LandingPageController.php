<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\FaqContract;
use App\Contracts\FeatureContract;
use App\Contracts\ModuleContract;
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



    public function index(SocialService $socialService, ModuleContract $moduleContract, FeatureContract $featureContract, FaqContract $faqContract)
    {
        $socials = $socialService->getAll();
        $hero = Hero::where('language_id',1)->latest()->first();
        $module  = $moduleContract->fetchLatestDataByLanguageIdWithRelation(['moduleDetails'], $this->languageId);
        $faq  = $faqContract->fetchLatestDataByLanguageIdWithRelation(['faqDetails'], $this->languageId);
        $features = $featureContract->all();
        return view('landlord.public-section.landing_page.index',compact('socials','hero','module','features','faq'));
    }
}
