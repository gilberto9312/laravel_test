<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UserSeeder;
class UserTest extends TestCase
{


    public function test_new_user(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_users_login()
    {

        $this->seed(UserSeeder::class);
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        $this->isAuthenticated();

    }

}
