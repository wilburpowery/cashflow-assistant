<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_be_registered_after_a_business_has_been_registered()
    {
        $business = $this->registerFirstUser();

        $this->assertDatabaseHas('users', [
            'name'        => 'John Doe',
            'email'       => 'john@example.com',
            'business_id' => $business['id'],
            ]);
    }

    /** @test **/
    public function the_first_user_is_created_as_an_administrator()
    {
        $this->registerFirstUser();

        $this->assertDatabaseHas('users', [
            'email'    => 'john@example.com',
            'is_admin' => true,
        ]);
    }

    protected function registerFirstUser()
    {
        $business = $this->postJson(route('businesses.store'), [
            'name'        => 'Test Business',
            'description' => 'A business dedicated to being used for testing.',
            ])->json()['business'];

        $this->post(route('register'), [
            'name'                  => 'John Doe',
            'email'                 => 'john@example.com',
            'password'              => 'secret',
            'password_confirmation' => 'secret',
            'business_id'           => $business['id'],
            ])->assertRedirect('/home');

        return $business;
    }
}
