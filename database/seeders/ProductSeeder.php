<?php

namespace Database\Seeders;

use App\enum\ProductTypes;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 40; $i++) {
            $data = new Product();
            $data->name = $faker->sentence(3); // Adjust to get a title-like string
            $data->status = 1;
            $data->slug = $faker->unique()->slug(3);
            $data->type = ProductTypes::values()[array_rand(ProductTypes::values())]; 
            $data->description = $faker->paragraph;
            $data->category_id = Category::inRandomOrder()->first()->id; 
            $data->quantity_in_stock = $faker->numberBetween(1, 100);
            $data->save();
        }
        
    }
}
