<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrationFlow()
    {
        $response = $this->post('/registro', [
            'name' => 'John Doe',
            'username' => 'johndoe1',
            'password' => 'password123',
        ]);

        // Assertions
        $response->assertStatus(302); 
        $response->assertRedirect('/'); 

        // Check if the user was created in the database
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'username' => 'johndoe1',
        ]);

        // Verify if the user is logged in
        $this->assertAuthenticated();

        // Retrieve the created user from the database
        $user = User::where('username', 'johndoe1')->first();
    }
}
