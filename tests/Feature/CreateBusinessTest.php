<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBusinessTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_may_register_their_business()
    {
        $this->withoutExceptionHandling();

        $this->postJson('/businesses', [
            'name'        => 'A Random Business',
            'description' => 'I do some random business work related to testing code',
        ])->assertStatus(201);

        $this->assertDatabaseHas('businesses', [
            'name'        => 'A Random Business',
            'description' => 'I do some random business work related to testing code',
        ]);
    }
}
