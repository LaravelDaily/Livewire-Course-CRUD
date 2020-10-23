<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->create()->each(function($product) {
            $product->categories()->attach(rand(1, 5));
            $product->categories()->attach(rand(6, 10));
        });
    }
}
