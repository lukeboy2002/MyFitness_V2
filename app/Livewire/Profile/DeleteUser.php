<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DeleteUser extends Component
{
    public string $password = '';

    public function deleteUser(): void
    {
        $this->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $this->redirect('/', navigate: true);
    }

    #[Layout('layouts.profile', ['pageTitle' => 'Delete Account'])]
    public function render()
    {
        return view('livewire.profile.delete-user');
    }
}
