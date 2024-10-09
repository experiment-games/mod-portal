<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagSeeder extends Seeder
{
    const TAGS = [
        'Action',
        'Adventure',
        'Casual',
        'Half-Life Universe',
        'Horror',
        'Mystery',
        'Multiplayer',
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
            Tag::findOrCreate([
                'name' => $tag,
            ]);
        }
    }
}
