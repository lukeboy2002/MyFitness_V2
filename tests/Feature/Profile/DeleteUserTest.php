<?php

use App\Livewire\Profile\DeleteUser;
use App\Models\User;
use Livewire\Livewire;

test('user can delete their account', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(DeleteUser::class)
        ->set('password', 'password')
        ->call('deleteUser')
        ->assertHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('correct password must be provided to delete account', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(DeleteUser::class)
        ->set('password', 'wrong-password')
        ->call('deleteUser')
        ->assertHasErrors(['password']);

    $this->assertNotNull($user->fresh());
});
