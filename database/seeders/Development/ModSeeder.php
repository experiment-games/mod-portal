<?php

namespace Database\Seeders\Development;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mods = [];

        $mods[] = [
            'author_id' => 1,
            'title' => 'My Half-Life 2 Mod',
            'description' => 'This is a mod for Half-Life 2 that has you play as a cat.',
            'cover_image_path' => 'https://via.placeholder.com/150',
            'approved_at' => now(),
            'published_at' => now(),
            'versions' => [
                [
                    'version' => '1.0.0',
                    'release_notes' => 'Initial release.',
                    'file_path' => 'https://via.placeholder.com/150',
                    'hash' => '1234567890',
                ],
            ],
            'tags' => [
                'Singleplayer',
                'Action',
                'Adventure',
            ],
        ];

        foreach ($mods as $mod) {
            $versions = $mod['versions'];

            unset($mod['versions']);

            $modModel = \App\Models\Mod::create($mod);

            foreach ($versions as $version) {
                $modModel->versions()->create($version);
            }
        }
    }
}
