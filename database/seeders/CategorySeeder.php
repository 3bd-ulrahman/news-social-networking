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
            $name = fake()->sentence(2);
            array_push($categories, [
                'name' => $name,
                'slug' => Str::slug($name),
                'status' => 1
            ]);
        }

        Category::query()->insert($categories);
    }
}
