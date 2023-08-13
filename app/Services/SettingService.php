<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\AnalyticSettingContract;
use App\Contracts\GeneralSettingContract;
use App\Facades\Alert;
use App\Facades\Utility;
use App\Models\Landlord\AnalyticSetting;
use Exception;
use Illuminate\Support\Facades\File;

class SettingService
{

    public function __construct(
        private GeneralSettingContract $generalSettingContract,
        private AnalyticSettingContract $analyticSettingContract,
    ){}

    public function getLatestGeneralSettingData() : object | null
    {
        return $this->generalSettingContract->fetchLatestData();
    }
    public function getLatestAnalyticSettingData() : object | null
    {
        return $this->analyticSettingContract->fetchLatestData();
    }

    public function updateGeneralSetting($request)
    {
        try {
            $data = [
                'site_title' => $request->site_title,
                'time_zone' => $request->time_zone,
                'phone' =>  $request->phone,
                'email' =>  $request->email,
                'free_trial_limit' =>  $request->free_trial_limit,
                'currency_code' =>  $request->currency_code,
                'frontend_layout' =>  $request->frontend_layout,
                'date_format' =>  $request->date_format,
                'footer' =>  $request->footer,
                'footer_link' =>  $request->footer_link,
                'developed_by' =>  $request->developed_by,
            ];

            $imageName = $this->imageHandle($request);
            if($imageName) {
                $data['site_logo'] = $imageName;
            }
            // $this->generalSettingContract->latestDataUpdate($data);
            $this->generalSettingContract->updateOrCreate([], $data);

            Utility::setEnv('APP_NAME', $data['site_title']);

            return Alert::successMessage('Data Submitted Successfully');
        }
        catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function updateAnalyticSetting($request)
    {
        try {
            $data = [
                'google_analytics_script' => $request->google_analytics_script,
                'facebook_pixel_script'  => $request->facebook_pixel_script,
                'chat_script' => $request->chat_script,
            ];

            $this->analyticSettingContract->updateOrCreate([], $data);

            return Alert::successMessage('Data Submitted Successfully');
        }
        catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    protected function imageHandle($request)
    {
        $imageName = null;

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imagesDirectory = public_path('landlord/images/logo');

            if (File::isDirectory($imagesDirectory)) {
                File::cleanDirectory($imagesDirectory);
            }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis") . 1;
            $imageName = $imageName . '.' . $ext;

            $image->move($imagesDirectory, $imageName);
        }
        return $imageName;
    }
}
