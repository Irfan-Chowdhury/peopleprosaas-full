<?php

namespace Tests;

use App\Models\Landlord\Language;
use App\Models\User;

trait Authenticate
{
    public function userAuthenticated()
    {
        User::factory()->create();
        Language::factory()->create();

        $this->post('/super-admin',[
            'username' => 'admin',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
    }
}
