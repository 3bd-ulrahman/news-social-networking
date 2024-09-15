<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [];

        for ($i=0; $i < 10; $i++) {
            array_push($contacts, [
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'subject' => fake()->title(),
                'body' => fake()->paragraph(),
                'ip_address' => fake()->ipv4(),
                'created_at' => fake()->dateTime(),
            ]);
        }

        Contact::query()->insert($contacts);
    }
}
