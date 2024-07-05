<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create cities
        $cities = City::factory(5)->create();

        // Create districts
        $cities->each(function ($city) {
            District::factory(3)->create(['city_id' => $city->id]);
        });

        // Create categories
        Category::factory(10)->create();
    }
}
