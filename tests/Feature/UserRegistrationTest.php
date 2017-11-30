<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_be_registered_after_a_business_has_been_registered()
    {
        $this->withoutExceptionHandling();

        $business = $this->postJson(route('businesses.store'), [
            'name' => 'Test Business',
            'description' => 'A business dedicated to being used for testing.'
        ])->json()['business'];

        $this->post(route('register'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'business_id' => $business['id']
        ])->assertRedirect('/home');

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'business_id' => $business['id']
        ]);
    }
}
