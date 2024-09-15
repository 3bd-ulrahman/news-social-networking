<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [];

        for ($i=0; $i < 10; $i++) {
            array_push($comments, [
                'article_id' => fake()->randomElement([1, 10]),
                'user_id' => fake()->randomElement([1, 10]),
                'content' => fake()->paragraph(2),
                'status' => fake()->randomElement([0, 1]),
                'ip_address' => fake()->ipv4()
            ]);
        }

        Comment::query()->insert($comments);
    }
}
