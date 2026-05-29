<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Distance extends Component
{
    public string $distance;

    public function mount(): void
    {
        $this->distance = auth()->user()->preferred_distance ?? 'km';
    }

    public function updatedDistance(string $value): void
    {
        auth()->user()->update([
            'preferred_distance' => $value,
        ]);

        $this->dispatch('distance-updated', distance: $value);
    }

    public function render()
    {
        return view('livewire.profile.distance');
    }
}
