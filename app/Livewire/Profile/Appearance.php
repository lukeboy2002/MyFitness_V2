<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Appearance extends Component
{
    public string $theme;

    public function mount(): void
    {
        $this->theme = auth()->user()->preferred_theme ?? 'system';
    }

    public function updatedTheme(string $value): void
    {
        auth()->user()->update([
            'preferred_theme' => $value,
        ]);

        $this->dispatch('appearance-updated', theme: $value);
    }

    #[Layout('layouts.profile', ['pageTitle' => 'Appearance'])]
    public function render()
    {
        return view('livewire.profile.appearance');
    }
}
