<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('articles');

        $images = [];

        for ($i=0; $i < 5; $i++) {
            $image = fake()->image();

            if (! $image) {
                continue;
            }

            array_push(
                $images,
                '/storage/'.Storage::disk('public')->putFile('articles', $image)
            );
        }

        $articles = [];

        for ($i=0; $i < 50; $i++) {
            array_push($articles, [
                'category_id' => fake()->numberBetween(1, 10),
                'user_id' => fake()->numberBetween(1, 10),
                'status' => fake()->randomElement([0, 1]),
                'is_commentable' => fake()->randomElement([0, 1]),
                'views_count' => fake()->numberBetween(0, 1000),
                'title' => fake()->sentence(5),
                'slug' => fake()->slug(3),
                'content' => fake()->paragraph(10),
                'images' => json_encode(fake()->randomElements($images, 2)),
                'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
            ]);
        }

        Article::query()->insert($articles);
    }
}
