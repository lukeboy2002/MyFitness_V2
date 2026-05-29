<?php

use App\Livewire\Profile\UpdateProfileInformation;
use App\Models\User;
use Livewire\Livewire;

test('profile information component can be rendered', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(UpdateProfileInformation::class)
        ->assertSee($user->name)
        ->assertSee($user->email);
});

test('profile information can be updated', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(UpdateProfileInformation::class)
        ->set('name', 'New Name')
        ->set('email', 'new@example.com')
        ->call('updateProfileInformation')
        ->assertHasNoErrors()
        ->assertDispatched('profile-updated');

    $user->refresh();

    $this->assertEquals('New Name', $user->name);
    $this->assertEquals('new@example.com', $user->email);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(UpdateProfileInformation::class)
        ->set('name', 'New Name')
        ->set('email', $user->email)
        ->call('updateProfileInformation')
        ->assertHasNoErrors();

    $this->assertNotNull($user->refresh()->email_verified_at);
});
