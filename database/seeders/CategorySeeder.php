<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 4; $i++) {
            $data = new Category();
            $data->name = $faker->title;
            $data->status = 1;
            $data->slug = $faker->unique()->slug(3);
            $data->save();
        }
    }
}
