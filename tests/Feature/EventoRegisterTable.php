<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
    $user = User::factory()->create([
        'username' => 'admin',
        'password' => bcrypt('henrique10'),
    ]);

    $response = $this->post('/login', [
        'username' => 'admin',
        'password' => 'henrique10',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/home');
    $this->assertAuthenticatedAs($user);
    }
}