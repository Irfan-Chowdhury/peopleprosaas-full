<?php

namespace Tests;

use App\Models\User;

trait Authenticate
{
    public function userAuthenticated()
    {
        User::factory()->create();
        $this->post('/super-admin',[
            'username' => 'admin',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
    }
}
