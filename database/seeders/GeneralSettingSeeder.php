<?php

namespace Database\Seeders;

use App\Http\traits\ENVFilePutContent;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    use ENVFilePutContent;

    public function run(): void
    {
        GeneralSetting::truncate();

        $timeZone = "Asia/Dhaka";
        $dateFormat = "d-m-Y";

        if(config('database.connections.peopleprosaas_landlord'))
        {
            $siteTitle = "PeopleProSAAS";

            $data = [
                'site_title' => $siteTitle,
                'site_logo'  => "logo.png",
                'time_zone' => $timeZone,
                'phone' => '01829498634',
                'email' => 'support@lion-coders.com',
                'free_trial_limit' => 5,
                'currency_code' => "USD",
                'frontend_layout' => "regular",
                'date_format' => $dateFormat,
                'footer' => "LionCoders",
                'footer_link' => "https://www.lion-coders.com",
                'developed_by' => 'LionCoders',
            ];
        }
        else {
            $siteTitle = "PeoplePro";

            $data = [
                'site_title' => $siteTitle,
                'site_logo'  => "logo.png",
                'time_zone' => $timeZone,
                'currency' => "$",
                'currency_format' => "prefix",
                'default_payment_bank' => 1,
                'date_format' => $dateFormat,
                'theme' => "default.css",
                'footer' => "LionCoders",
                'footer_link' => "https://www.lion-coders.com",
            ];
        }


        GeneralSetting::create($data);

        //writting timezone info in .env file
        $this->dataWriteInENVFile('APP_NAME',$siteTitle);
        $this->dataWriteInENVFile('APP_TIMEZONE',$timeZone);
        $this->dataWriteInENVFile('Date_Format',$dateFormat);
        $js_format = config('date_format_conversion.' . $dateFormat);
        $this->dataWriteInENVFile('Date_Format_JS',$js_format);
        $this->dataWriteInENVFile('ENABLE_EARLY_CLOCKIN',1);
    }
}
