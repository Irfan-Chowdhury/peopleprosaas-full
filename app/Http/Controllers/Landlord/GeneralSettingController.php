<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\GeneralSettingContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSetting\GeneralSettingRequest;
use App\Models\Landlord\GeneralSetting;
use App\Services\GeneralSettingService;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    private $generalSettingService;

    public function __construct(GeneralSettingService $generalSettingService)
    {
        $this->generalSettingService = $generalSettingService;
    }

    public function index()
    {
        $generalSetting =  $this->generalSettingService->getLatestData();
        $timeZones = $this->generalSettingService->timeZoneData();

        return view('landlord.super-admin.pages.settings.index', compact('timeZones','generalSetting'));
    }

    public function generalSettingManage(GeneralSettingRequest $request)
    {
        $result = $this->generalSettingService->updateLatest($request);
        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
