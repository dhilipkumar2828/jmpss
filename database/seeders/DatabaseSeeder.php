<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\HomeSection;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Award;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        Admin::updateOrCreate(
            ['email' => 'admin@jmpss.edu'],
            [
                'name'      => 'Super Admin',
                'password'  => Hash::make('Admin@1234'),
                'role'      => 'superadmin',
                'is_active' => true,
            ]
        );


        // Home Sections
        HomeSection::insert([
            [
                'section_type' => 'principal',
                'title'        => "Principal's Desk",
                'name'         => 'Dr. R. Krishnamurthy',
                'designation'  => 'Principal, JMPSS',
                'content'      => 'Welcome to JMPSS – a place where knowledge meets character. Our mission is to nurture young minds with values, skills, and vision to face tomorrow\'s challenges. We believe every child is unique and we are committed to bringing out the best in each student.',
                'quote'        => 'Education is not preparation for life; education is life itself.',
                'sort_order'   => 1,
                'is_active'    => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'section_type' => 'correspondent',
                'title'        => "Correspondent's Desk",
                'name'         => 'Shri. M. Jayakumar',
                'designation'  => 'Correspondent, JMPSS',
                'content'      => 'JMPSS was founded with a singular vision – to provide world-class education to every child irrespective of their background. We continue to grow and evolve, embracing modern teaching methodologies while staying true to our core values of discipline, integrity, and excellence.',
                'quote'        => 'The roots of education are bitter, but the fruit is sweet.',
                'sort_order'   => 2,
                'is_active'    => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Events
        Event::insert([
            ['title' => 'Annual Sports Day 2025', 'description' => 'A grand celebration of sports and fitness featuring inter-house competitions across 20+ sports.', 'event_date' => '2025-03-15', 'event_time' => '08:00:00', 'venue' => 'School Ground', 'category' => 'Sports', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Science Exhibition', 'description' => 'Students showcase their innovative science projects and experiments to parents and the public.', 'event_date' => '2025-04-10', 'event_time' => '10:00:00', 'venue' => 'School Auditorium', 'category' => 'Academic', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Cultural Fest – Kalai Vizha', 'description' => 'Annual cultural extravaganza showcasing dance, music, drama, and art from all grades.', 'event_date' => '2025-05-20', 'event_time' => '09:00:00', 'venue' => 'School Auditorium', 'category' => 'Cultural', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Republic Day Celebration', 'description' => 'Patriotic event with flag hoisting, march-past, and cultural programmes.', 'event_date' => '2025-01-26', 'event_time' => '08:30:00', 'venue' => 'School Ground', 'category' => 'National', 'is_featured' => false, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Awards
        Award::insert([
            ['title' => 'State Level Mathematics Olympiad – Gold', 'description' => 'First place in State Mathematics Olympiad 2024.', 'recipient_name' => 'Aarav Sharma', 'recipient_class' => 'Class X', 'year' => 2024, 'category' => 'Academic', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'District Sports Champion – Athletics', 'description' => 'Gold medal in 100m sprint at District Level Sports Meet.', 'recipient_name' => 'Priya Devi', 'recipient_class' => 'Class IX', 'year' => 2024, 'category' => 'Sports', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Best School Award – District', 'description' => 'Awarded best school in the district for academic excellence.', 'recipient_name' => 'JMPSS', 'recipient_class' => null, 'year' => 2024, 'category' => 'Institutional', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'National Science Talent Search', 'description' => 'Selected for National Science Talent Search Examination.', 'recipient_name' => 'Karthik Raj', 'recipient_class' => 'Class VIII', 'year' => 2023, 'category' => 'Academic', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Testimonials
        Testimonial::insert([
            ['name' => 'Mrs. Anitha Suresh', 'designation' => 'Parent of Grade VIII student', 'content' => 'JMPSS has transformed my child completely. The teachers here are dedicated and the environment is wonderful. My son has grown not just academically but as a person.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rahul Narayanan', 'designation' => 'Alumni – Batch 2020', 'content' => 'The foundation I received at JMPSS helped me crack IIT-JEE. The teachers were always available and the lab facilities are excellent. Forever grateful!', 'rating' => 5, 'type' => 'alumni', 'passing_year' => 2020, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Deepa Krishnan', 'designation' => 'Parent of Grade V student', 'content' => 'A school that truly cares about every student. The co-curricular activities are excellent and my daughter has developed so many skills in just one year.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
