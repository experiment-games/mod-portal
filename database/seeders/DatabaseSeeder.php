<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $isProduction = app()->environment('production');

        $this->call([
            TagSeeder::class,
        ]);

        if (!$isProduction) {
            $this->call([
                Development\UserSeeder::class,
                Development\ModSeeder::class,
            ]);
        }
    }
}
