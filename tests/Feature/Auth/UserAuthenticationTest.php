<?php

use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

it('logs in an existing user', function () {
    $user = User::factory()->create([
        'password' => Hash::make('securepassword'),
    ]);

    $response = $this->postJson('/api/v1/auth/login', [
        'email' => $user->email,
        'password' => 'securepassword',
    ]);

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully logged in.')
        ->assertJsonStructure([
            'data' => [
                'user',
                'token',
            ],
            'message',
        ]);
});

it('fails to log in with incorrect credentials', function () {
    $response = $this->postJson('/api/v1/auth/login', [
        'email' => 'wrong@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertStatus(422)
        ->assertJsonPath('message', 'The provided credentials are incorrect.')
        ->assertJsonStructure(['message']);
});

it('logs out an authenticated user', function () {
    $user = User::factory()->create([
        'password' => Hash::make('securepassword'),
    ]);

    $this->actingAs($user);

    $response = $this->postJson('/api/v1/auth/logout');

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully logged out.')
        ->assertJsonStructure([
            'data',
            'message',
        ]);
});

it('fails to log out unauthenticated user', function () {
    $response = $this->postJson('/api/v1/auth/logout');

    $response->assertStatus(401)
        ->assertJsonPath('message', 'Unauthenticated.')
        ->assertJsonStructure(['message']);
});
