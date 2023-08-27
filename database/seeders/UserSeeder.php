<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    public function run()
    {
        // if(!config('database.connections.peopleprosaas_landlord')) {
        if (in_array(request()->getHost(), config('tenancy.central_domains'))) {
            $data = [
                [
                    'first_name'=>'Mr',
                    'last_name'=>'Admin',
                    'username'=> 'admin',
                    'email'=> 'admin@gmail.com',
                    'password'=> bcrypt('admin'),
                    'role_users_id'=> 1,
                    'is_active'=> true,
                    'contact_no'=> 123456789
                ],
                [
                    'first_name'=>'Mr',
                    'last_name'=>'Employee',
                    'username'=> 'employee',
                    'email'=> 'employee@gmail.com',
                    'password'=> bcrypt('employee'),
                    'role_users_id'=> 2,
                    'is_active'=> true,
                    'contact_no'=> 987654321
                ],
                [
                    'first_name'=>'Mr',
                    'last_name'=>'Client',
                    'username'=> 'client',
                    'email'=> 'client@gmail.com',
                    'password'=> bcrypt('client'),
                    'role_users_id'=> 1,
                    'is_active'=> true,
                    'contact_no'=> 123987456
                ]
            ];
        }else {
            $data = [
                [
                    'first_name'=>'Mr',
                    'last_name'=>'Admin',
                    'username'=> 'admin',
                    'email'=> 'admin@gmail.com',
                    'password'=> bcrypt('admin'),
                    'is_active'=> true,
                    'is_super_admin'=> true,
                ]
            ];
        }


        User::insert($data);
    }
}
