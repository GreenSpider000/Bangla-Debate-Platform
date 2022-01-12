<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'firstName' => 'Test user firstName',
            'lastName' => 'Test user lastName',
            'userName' => 'Test_User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'password_confirmation' => Hash::make('password'),
        ]);

        $response->attachRole('user');
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
   
}
