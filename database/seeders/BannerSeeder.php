<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing banners to start fresh with high-quality dummy data
        Banner::truncate();

        $banners = [
            [
                'page' => 'home',
                'banner_type' => 'slider',
                'title' => 'EMPOWERING YOUNG MINDS',
                'subtitle' => 'Nurturing excellence through innovative learning and value-based education.',
                'image_path' => 'uploads/banners/banner1.png',
                'button_text' => 'Learn More',
                'button_link' => '/about',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'home',
                'banner_type' => 'slider',
                'title' => 'BEYOND ACADEMICS',
                'subtitle' => 'Engaging students in a rich variety of sports, arts, and cultural activities.',
                'image_path' => 'uploads/banners/banner2.png',
                'button_text' => 'Explore Campus',
                'button_link' => '/gallery',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'page' => 'gallery',
                'banner_type' => 'page_header',
                'title' => 'VIBRANT MOMENTS',
                'subtitle' => 'A glimpse into the diverse life at JMPSSS.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'about',
                'banner_type' => 'page_header',
                'title' => 'OUR STORY & VISION',
                'subtitle' => 'Committed to building a foundation of integrity and knowledge since inception.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'videos',
                'banner_type' => 'page_header',
                'title' => 'VIDEO GALLERY',
                'subtitle' => 'Experience our school activities and events through motion.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'academics',
                'banner_type' => 'page_header',
                'title' => 'ACADEMIC EXCELLENCE',
                'subtitle' => 'Providing a world-class curriculum that challenges and inspires students.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'admissions',
                'banner_type' => 'page_header',
                'title' => 'ADMISSIONS 2025-26',
                'subtitle' => 'Join the JMPSSS family. Start your journey towards a bright future today.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'events',
                'banner_type' => 'page_header',
                'title' => 'CAMPUS LIFE & EVENTS',
                'subtitle' => 'Celebrating achievements and fostering community through varied events.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'awards',
                'banner_type' => 'page_header',
                'title' => 'AWARDS & ACHIEVEMENTS',
                'subtitle' => 'Celebrating the success and hard work of our talented students and faculty.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'careers',
                'banner_type' => 'page_header',
                'title' => 'CAREERS AT JMPSSS',
                'subtitle' => 'Join our team of dedicated educators and professionals.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'page' => 'contact',
                'banner_type' => 'page_header',
                'title' => 'GET IN TOUCH',
                'subtitle' => 'We are here to answer your questions and welcome you to our school family.',
                'image_path' => 'uploads/banners/header_default.png',
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
