<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    const TAGS = [
        'Action',
        'Adventure',
        'Casual',
        'Half-Life Universe',
        'Horror',
        'Mystery',
        'Portal Universe',
        'Racing',
        'Roleplay',
        'RPG',
        'Simulation',
        'Sports',
        'Strategy',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (static::TAGS as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}
