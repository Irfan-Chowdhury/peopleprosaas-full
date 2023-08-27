<?php

namespace Database\Seeders;

use Database\Seeders\DepartmentTableSeeder;
use Database\Seeders\CountriesTableSeeder;
use Database\Seeders\GeneralSettingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CountriesTableSeeder::class);

        // if(config('database.connections.peopleprosaas_landlord')) {
        if (!in_array(request()->getHost(), config('tenancy.central_domains'))) {
            $this->call([
                UserSeeder::class,
                GeneralSettingSeeder::class,
                LanguageSeeder::class,
                HeroSeeder::class,
                SocialSeeder::class,
                ModuleSeeder::class,
                FaqSeeder::class,
                TestimonialSeeder::class,
                TenantSignupDescriptionSeeder::class,
                PageSeeder::class,
                LandlordPermissionsSeeder::class,
            ]);
        }
        else {
            $this->call([
                CountriesTableSeeder::class,
                GeneralSettingSeeder::class,
                // PermissionsSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,
            ]);
        }

    }
}
