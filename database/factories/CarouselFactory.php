<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Carousel>
 */
class CarouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => fake()->imageUrl(),
            'author' => fake()->name(),
            'link' => fake()->url(),
        ];
    }
}
