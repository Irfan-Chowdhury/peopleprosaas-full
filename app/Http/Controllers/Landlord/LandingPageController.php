<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\SocialContract;
use App\Http\Controllers\Controller;
use App\Models\Landlord\Social;
use App\Services\SocialService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(SocialService $socialService)
    {
        $socials = $socialService->getAll();

        return view('landlord.public-section.landing_page.index',compact('socials'));
    }
}
