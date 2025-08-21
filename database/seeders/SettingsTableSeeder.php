<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'key' => 'upcoming_events_count',
            'value' => '3',
        ]);
    }
}