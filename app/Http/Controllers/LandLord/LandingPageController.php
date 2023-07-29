<?php

namespace App\Http\Controllers\LandLord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landlord.landing_page.index');
    }
}
