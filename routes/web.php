<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('welcome');
// })->name('home');
//
// Route::get('/dashboard', function () {
//    return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::passkeys();

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

});

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
