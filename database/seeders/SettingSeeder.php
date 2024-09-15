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
                'value' => 'default'
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
                'value' => 'default country'
            ],
            [
                'key' => 'city',
                'value' => 'default city'
            ],
            [
                'key' => 'street',
                'value' => 'default street'
            ],
            [
                'key' => 'facebook',
                'value' => 'default'
            ],
            [
                'key' => 'twitter',
                'value' => 'default'
            ],
            [
                'key' => 'phone',
                'value' => '010'
            ]
        ]);
    }
}
