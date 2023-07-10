<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginScreenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginScreenHasLogInInHeader()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertSeeText('Log in', $escaped = false);
    }
}
