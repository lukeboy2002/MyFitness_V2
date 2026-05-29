<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Profile\Appearance;
use App\Livewire\Profile\DeleteUser;
use App\Livewire\Profile\Language;
use App\Livewire\Profile\UpdatePassword;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/passkeys', [ProfileController::class, 'passkeys'])->name('profile.passkeys');
    Route::get('/profile/units', [ProfileController::class, 'units'])->name('profile.units');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/profile/password', UpdatePassword::class)->name('profile.password');
    Route::get('/profile/delete', DeleteUser::class)->name('profile.delete');

    Route::get('/profile/appearance', Appearance::class)->name('profile.appearance');
    Route::get('/profile/language', Language::class)->name('profile.language');
});
