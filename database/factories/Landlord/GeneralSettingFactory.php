<?php

namespace Database\Factories\Landlord;

use App\Models\Landlord\GeneralSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralSetting>
 */
class GeneralSettingFactory extends Factory
{
    protected $model = GeneralSetting::class;

    public function definition(): array
    {
        return [
            'site_title' => "PeopleProSAAS",
            // 'site_logo'  => "logo.png",
            'site_logo'  => null,
            'time_zone' => "Asia/Dhaka",
            'phone' => '01829498634',
            'email' => 'support@lion-coders.com',
            'free_trial_limit' => 5,
            'currency_code' => "USD",
            'frontend_layout' => "regular",
            'date_format' => "d-m-Y",
            'footer' => "LionCoders",
            'footer_link' => "https://www.lion-coders.com",
            'developed_by' => 'LionCoders',
        ];
    }
}
