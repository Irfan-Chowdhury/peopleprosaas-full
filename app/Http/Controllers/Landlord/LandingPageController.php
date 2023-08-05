<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landlord.public-section.landing_page.index');
    }
}
