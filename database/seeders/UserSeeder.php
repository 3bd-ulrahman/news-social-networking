<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('users');

        $images = [];

        for ($i=0; $i < 5; $i++) {
            $image = fake()->image();
            if (! $image) {
                continue;
            }

            array_push(
                $images,
                'storage/'.Storage::disk('public')->putFile('users', fake()->image())
            );
        }

        $user = [
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@example.com',
            'phone' => fake()->phoneNumber(),
            'status' => fake()->randomElement([0, 1]),
            'avatar' => fake()->randomElement($images),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'street' => fake()->streetAddress(),
            'password' => Hash::make('password'),
        ];

        $users = [];

        for ($i=0; $i < 10; $i++) {
            array_push($users, [
                'name' => fake()->name(),
                'username' => fake()->userName(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'status' => fake()->randomElement([0, 1]),
                'avatar' => fake()->randomElement($images),
                'country' => fake()->country(),
                'city' => fake()->city(),
                'street' => fake()->streetAddress(),
                'password' => Hash::make('password'),
            ]);
        }

        User::query()->insert([$user, ...$users]);
    }
}
