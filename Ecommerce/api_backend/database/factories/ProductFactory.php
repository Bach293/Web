<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'sku' => $this->faker->unique()->numerify('SKU-####'),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'discount_amount' => $this->faker->randomFloat(2, 0, 100),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'status' => $this->faker->randomElement([0, 1, 2]),
            'draft_content' => null,
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'trademark' => $this->faker->word,
            'warranty_period' => $this->faker->numberBetween(1, 24) . ' months',
            'type' => $this->faker->word,
            'ship_from' => $this->faker->city,
            'category_id' => Category::factory(),
            'store_id' => Store::factory(),
        ];
    }
}
