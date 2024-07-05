<?php

namespace Database\Factories;
use App\Models\City;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = \App\Models\Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_name' => $this->faker->company,
            'address' => $this->faker->address,
            'image_url' => $this->faker->imageUrl,
            'city_id' => City::factory(),
            'district_id' => District::factory(),
        ];
    }
}
