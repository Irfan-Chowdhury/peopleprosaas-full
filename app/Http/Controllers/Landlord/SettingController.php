<?php

namespace App\Http\Controllers\Landlord;

use App\Contracts\GeneralSettingContract;
use App\Facades\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\AnalyticSettingRequest;
use App\Http\Requests\Setting\GeneralSettingRequest;
use App\Http\Requests\Setting\PaymentSettingRequest;
use App\Http\Requests\Setting\SeoSettingRequest;
use App\Models\Landlord\AnalyticSetting;
use App\Models\Landlord\GeneralSetting;
use App\Services\GeneralSettingService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function __construct(private SettingService $settingService){}

    public function index()
    {
        $timeZones = Utility::timeZoneData();
        $dateFormat = Utility::dateFormat();
        $generalSetting =  $this->settingService->getLatestGeneralSettingData();
        $paymentSetting =  $this->settingService->getLatestPaymentSettingData();
        $analyticSetting =  $this->settingService->getLatestAnalyticSettingData();
        $seoSetting =  $this->settingService->getLatestSeoSettingData();


        return view('landlord.super-admin.pages.settings.index', compact([
            'timeZones' , 'dateFormat', 'generalSetting', 'paymentSetting', 'analyticSetting', 'seoSetting'
        ]));
    }

    public function generalSettingManage(GeneralSettingRequest $request)
    {
        $result = $this->settingService->updateGeneralSetting($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function analyticSettingManage(AnalyticSettingRequest $request)
    {
        $result = $this->settingService->updateAnalyticSetting($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function seoSettingManage(SeoSettingRequest $request)
    {
        $result = $this->settingService->updateSeoSetting($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }

    public function paymentSettingManage(PaymentSettingRequest $request)
    {
        $result = $this->settingService->updatePaymentSetting($request);

        return response()->json($result['alertMsg'], $result['statusCode']);
    }
}
