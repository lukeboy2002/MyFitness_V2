<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Language extends Component
{
    public string $language;

    public function mount(): void
    {
        $this->language = auth()->user()->preferred_language ?? 'en';
    }

    public function updatedLanguage(string $value): void
    {
        auth()->user()->update([
            'preferred_language' => $value,
        ]);

        $this->dispatch('language-updated', language: $value);
    }

    #[Layout('layouts.profile', ['pageTitle' => 'Language'])]
    public function render()
    {
        return view('livewire.profile.language');
    }
}
