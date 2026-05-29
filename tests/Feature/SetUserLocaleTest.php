<?php

use App\Models\User;

use function PHPUnit\Framework\assertEquals;

test('it sets the application locale based on the authenticated user preference', function () {
    $user = User::factory()->create([
        'preferred_language' => 'nl',
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertStatus(200);

    assertEquals('nl', app()->getLocale());
});

test('it defaults to config locale for guest users', function () {
    $this->get('/login')
        ->assertStatus(200);

    assertEquals(config('app.locale'), app()->getLocale());
});

test('it sets the locale to english if preferred', function () {
    $user = User::factory()->create([
        'preferred_language' => 'en',
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertStatus(200);

    assertEquals('en', app()->getLocale());
});
