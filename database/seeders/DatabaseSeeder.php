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

        $this->call([
            CountriesTableSeeder::class,
            GeneralSettingSeeder::class,
            PermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);

    }
}
