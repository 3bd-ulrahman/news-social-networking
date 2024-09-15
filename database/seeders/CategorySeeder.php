<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];

        for ($i=0; $i < 10; $i++) {
            array_push($categories, [
                'name' => fake()->title(),
                'slug' => fake()->slug(3),
                'status' => 1
            ]);
        }

        Category::query()->insert($categories);
    }
}
