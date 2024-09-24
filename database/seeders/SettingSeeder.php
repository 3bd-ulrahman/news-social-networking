<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->insert([
            [
                'key' => 'site_name',
                'value' => 'news'
            ],
            [
                'key' => 'logo',
                'value' => 'assets/website/img/logo.png'
            ],
            [
                'key' => 'favicon',
                'value' => 'default'
            ],
            [
                'key' => 'email',
                'value' => 'news@gmail.com'
            ],
            [
                'key' => 'country',
                'value' => 'Egypt'
            ],
            [
                'key' => 'city',
                'value' => fake()->city()
            ],
            [
                'key' => 'street',
                'value' => fake()->streetName()
            ],
            [
                'key' => 'facebook',
                'value' => 'https://www.facebook.com'
            ],
            [
                'key' => 'twitter',
                'value' => 'https://twitter.com'
            ],
            [
                'key' => 'linkedin',
                'value' => 'https://www.linkedin.com'
            ],
            [
                'key' => 'youtube',
                'value' => 'https://www.youtube.com'
            ],
            [
                'key' => 'instagram',
                'value' => 'https://www.instagram.com'
            ],
            [
                'key' => 'phone',
                'value' => '010'
            ]
        ]);
    }
}
