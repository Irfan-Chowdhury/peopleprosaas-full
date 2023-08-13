<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\AnalyticSettingContract;
use App\Contracts\GeneralSettingContract;
use App\Contracts\SeoSettingContract;
use App\Facades\Alert;
use App\Facades\Utility;
use App\Models\Landlord\AnalyticSetting;
use Exception;
use Illuminate\Support\Facades\File;

class SettingService
{

    private $siteLogoPath = "landlord/images/logo/";
    private $ogImagePath = "landlord/images/seo-setting/";

    public function __construct(
        private GeneralSettingContract $generalSettingContract,
        private AnalyticSettingContract $analyticSettingContract,
        private SeoSettingContract $seoSettingContract,
    ){}

    public function getLatestGeneralSettingData() : object | null
    {
        return $this->generalSettingContract->fetchLatestData();
    }
    public function getLatestAnalyticSettingData() : object | null
    {
        return $this->analyticSettingContract->fetchLatestData();
    }
    public function getLatestSeoSettingData() : object | null
    {
        return $this->seoSettingContract->fetchLatestData();
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

            $imageName = $this->imageHandle($request->site_logo, $this->siteLogoPath);
            if($imageName) {
                $data['site_logo'] = $imageName;
            }
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

    public function updateSeoSetting($request)
    {
        try {
            $data = [
                'meta_title' => $request->meta_title,
                'meta_description'  => $request->meta_description,
                'og_title' => $request->og_title,
                'og_description' => $request->og_description,
            ];
            $imageName = $this->imageHandle($request->og_image, $this->ogImagePath);
            if($imageName) {
                $data['og_image'] = $imageName;
            }

            $this->seoSettingContract->updateOrCreate([], $data);

            return Alert::successMessage('Data Submitted Successfully');
        }
        catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    protected function imageHandle($image, $path)
    {
        $imageName = null;

        if ($image) {
            $imagesDirectory = public_path($path);

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
