<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\BlogContract;
use App\Contracts\FaqContract;
use App\Contracts\FeatureContract;
use App\Contracts\ModuleContract;
use App\Contracts\SocialContract;
use App\Contracts\TenantSignupDescriptionContract;
use App\Contracts\TestimonialContract;
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
    public function __construct(public SocialContract $socialContract, public BlogContract $blogContract)
    {
        $this->middleware(function ($request, $next){
            $this->languageId = Session::has('TempSuperAdminLangId')==true ? Session::get('TempSuperAdminLangId') : Session::get('DefaultSuperAdminLangId');
            return $next($request);
        });
    }


    public function index(
        ModuleContract $moduleContract,
        FeatureContract $featureContract,
        FaqContract $faqContract,
        TestimonialContract $testimonialContract,
        TenantSignupDescriptionContract $tenantSignupDescriptionContract,
    )
    {
        $socials = $this->socialContract->getOrderByPosition();
        $hero = Hero::where('language_id',1)->latest()->first();
        $module  = $moduleContract->fetchLatestDataByLanguageIdWithRelation(['moduleDetails'], $this->languageId);
        $faq  = $faqContract->fetchLatestDataByLanguageIdWithRelation(['faqDetails'], $this->languageId);
        $features = $featureContract->all();
        $testimonials = $testimonialContract->getOrderByPosition();
        $tenantSignupDescription =  $tenantSignupDescriptionContract->fetchLatestDataByLanguageId($this->languageId);
        $blogs =  $this->blogContract->getAllByLanguageId($this->languageId);
        return view('landlord.public-section.pages.landing-page.index',compact([
            'socials','hero','module','features','faq','testimonials','tenantSignupDescription','blogs'
        ]));
    }

    public function blog()
    {
        $socials = $this->socialContract->getOrderByPosition();
        $blogs =  $this->blogContract->getAllByLanguageId($this->languageId);

        return view('landlord.public-section.pages.blogs.index',compact('socials','blogs'));
    }

    public function blogDetail($slug)
    {
        return $slug;
    }
}
