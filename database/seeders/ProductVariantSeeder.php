<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (Product::all() as $product) {
            $variantCount = $faker->numberBetween(1, 5); // Define the number of variants per product
            $showVariantSet = false; // Flag to ensure only one variant has is_show set to 1
    
            for ($i = 1; $i <= $variantCount; $i++) {
                $data = new ProductVariant();
                $data->product_id = $product->id;
                $data->variant_name = $faker->word . " Variant"; 
                $data->measurement = $faker->randomFloat(2, 0.5, 5); // Example: random weight or volume
                $data->measurement_param = $faker->randomElement(['kg', 'g', 'L', 'ml', 'pcs']); // Random measurement unit
                $data->price = $faker->randomFloat(2, 5, 100); // Price between $5 and $100
                $data->quantity = $faker->numberBetween(1, 50); // Quantity between 1 and 50
    
                // Set is_show to 1 only for one variant per product
                $data->is_show = !$showVariantSet && $i === $variantCount ? 1 : 0; 
    
                $data->save();
    
                if ($data->is_show) {
                    $showVariantSet = true; // Mark that the is_show variant has been set for this product
                }
            }
        }
    }
}
