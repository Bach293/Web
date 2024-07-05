<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = \App\Models\Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'related_id' => 1, // This should be set correctly depending on the related entity
            'related_type' => $this->faker->randomElement(['product', 'review']),
            'image_url' => $this->faker->imageUrl,
        ];
    }
}
