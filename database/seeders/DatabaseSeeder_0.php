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
        // $this->call(TenantSeeder::class);

        // if(config('database.connections.peopleprosaas_landlord')) {
        if(config('database.connections.peoplepro_test')) {
        // if (!in_array(request()->getHost(), config('tenancy.central_domains'))) {
            $this->call([
                LandlordUserSeeder::class,
                LandlordGeneralSettingSeeder::class,
                LanguageSeeder::class,
                HeroSeeder::class,
                SocialSeeder::class,
                ModuleSeeder::class,
                FaqSeeder::class,
                TestimonialSeeder::class,
                TenantSignupDescriptionSeeder::class,
                PageSeeder::class,
                LandlordPermissionsSeeder::class,
                PackageSeeder::class,
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
