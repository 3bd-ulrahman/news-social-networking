<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement("SET foreign_key_checks=0");

        $this->call([
            AdminSeeder::class,
            ArticleSeeder::class,
            CategorySeeder::class,
            CommentSeeder::class,
            ContactSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            NewsletterSeeder::class
        ]);

        DB::statement("SET foreign_key_checks=1");
    }
}
