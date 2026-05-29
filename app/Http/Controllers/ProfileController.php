<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function edit(): View
    {
        return view('profile.edit');
    }

    public function passkeys(): View
    {
        return view('profile.passkey');
    }

    public function units(): View
    {
        return view('profile.units');
    }
}
