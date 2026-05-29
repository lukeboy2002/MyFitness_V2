<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Weight extends Component
{
    public string $weight;

    public function mount(): void
    {
        $this->weight = auth()->user()->preferred_weight ?? 'kg';
    }

    public function updatedWeight(string $value): void
    {
        auth()->user()->update([
            'preferred_weight' => $value,
        ]);

        $this->dispatch('weight-updated', weight: $value);
    }

    #[Layout('layouts.profile', ['pageTitle' => 'Weight'])]
    public function render()
    {
        return view('livewire.profile.weight');
    }
}
