<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        // ─── Album 1: Diwali Function ─────────────────────────────
        $diwali = Gallery::create([
            'title'       => 'Diwali Celebration',
            'description' => 'Students and staff celebrated Diwali with great enthusiasm.',
            'category'    => 'Festivals',
            'type'        => 'photo',
            'is_active'   => true,
            'sort_order'  => 1,
        ]);
        foreach ([
            'assets/jmpsss/image/img01.jpg',
            'assets/jmpsss/image/img02.jpg',
            'assets/jmpsss/image/img03.jpg',
        ] as $path) {
            GalleryItem::create(['gallery_id' => $diwali->id, 'item_type' => 'photo', 'file_path' => $path]);
        }
        GalleryItem::create(['gallery_id' => $diwali->id, 'item_type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);

        // ─── Album 2: Pongal Function ─────────────────────────────
        $pongal = Gallery::create([
            'title'       => 'Pongal Celebrations',
            'description' => 'Pongal was celebrated with traditional rituals and cultural programs.',
            'category'    => 'Festivals',
            'type'        => 'photo',
            'is_active'   => true,
            'sort_order'  => 2,
        ]);
        foreach ([
            'assets/jmpsss/image/img04.jpg',
            'assets/jmpsss/image/img05.jpg',
            'assets/jmpsss/image/img06.jpg',
        ] as $path) {
            GalleryItem::create(['gallery_id' => $pongal->id, 'item_type' => 'photo', 'file_path' => $path]);
        }
        GalleryItem::create(['gallery_id' => $pongal->id, 'item_type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);

        // ─── Album 3: Annual Day 2024 ─────────────────────────────
        $annualDay = Gallery::create([
            'title'       => 'Annual Day 2024',
            'description' => 'Students showcased their talents in drama, dance, and music.',
            'category'    => 'Annual Function',
            'type'        => 'photo',
            'is_active'   => true,
            'sort_order'  => 3,
        ]);
        foreach ([
            'assets/jmpsss/image/img07.jpg',
            'assets/jmpsss/image/img08.jpg',
        ] as $path) {
            GalleryItem::create(['gallery_id' => $annualDay->id, 'item_type' => 'photo', 'file_path' => $path]);
        }
        GalleryItem::create(['gallery_id' => $annualDay->id, 'item_type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);

        // ─── Album 4: Sports Meet 2024 ────────────────────────────
        $sports = Gallery::create([
            'title'       => 'Sports Meet 2024',
            'description' => 'Athletes competed in track events, team sports, and individual challenges.',
            'category'    => 'Sports',
            'type'        => 'photo',
            'is_active'   => true,
            'sort_order'  => 4,
        ]);
        foreach ([
            'assets/jmpsss/image/new/slider1.jpg',
            'assets/jmpsss/image/new/slider2.jpg',
        ] as $path) {
            GalleryItem::create(['gallery_id' => $sports->id, 'item_type' => 'photo', 'file_path' => $path]);
        }

        // ─── Album 5: Science Exhibition ─────────────────────────
        $science = Gallery::create([
            'title'       => 'Science Exhibition 2024',
            'description' => 'Young scientists presented projects on environment, robotics, and health.',
            'category'    => 'Academic',
            'type'        => 'photo',
            'is_active'   => true,
            'sort_order'  => 5,
        ]);
        GalleryItem::create(['gallery_id' => $science->id, 'item_type' => 'photo', 'file_path' => 'assets/jmpsss/image/img01.jpg']);
        GalleryItem::create(['gallery_id' => $science->id, 'item_type' => 'video', 'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);
    }
}
