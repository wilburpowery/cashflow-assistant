<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateClientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_register_new_clients()
    {
        $this->signIn();

        $client = make('App\Client');

        $client = $this->postJson(route('clients.store'), $client->toArray())->assertSuccessful()->json();

        $this->assertDatabaseHas('clients', [
            'id'         => $client['id'],
            'first_name' => $client['first_name'],
            'last_name'  => $client['last_name'],
            'email'      => $client['email'],
        ]);
    }
}
