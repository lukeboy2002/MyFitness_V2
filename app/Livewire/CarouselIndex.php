<?php

namespace App\Livewire;

use App\Models\Carousel;
use Livewire\Component;

class CarouselIndex extends Component
{
    public function render()
    {
        $items = Carousel::all();

        return view('livewire.carousel-index', compact('items'));
    }
}
