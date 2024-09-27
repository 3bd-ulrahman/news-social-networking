<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsletters = [];

        for ($i=0; $i < 10; $i++) {
            array_push($newsletters, [
                'email' => fake()->safeEmail(),
            ]);
        }

        Newsletter::query()->insert($newsletters);
    }
}
