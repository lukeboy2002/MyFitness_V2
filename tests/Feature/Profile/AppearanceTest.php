<?php

use App\Livewire\Profile\Appearance;
use App\Models\User;
use Livewire\Livewire;

test('appearance component can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(Appearance::class)
        ->assertSee(__('Appearance'))
        ->assertSee(__('Light'))
        ->assertSee(__('Dark'))
        ->assertSee(__('System'));
});

test('appearance can be updated', function () {
    $user = User::factory()->create([
        'preferred_theme' => 'light',
    ]);

    $this->actingAs($user);

    Livewire::test(Appearance::class)
        ->set('theme', 'dark')
        ->assertDispatched('appearance-updated', theme: 'dark');

    $this->assertEquals('dark', $user->refresh()->preferred_theme);
});
