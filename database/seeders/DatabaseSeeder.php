<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
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
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@1234'),
                'role' => 'superadmin',
                'is_active' => true,
            ]
        );

        // Events
        Event::insert([
            ['title' => 'Annual Sports Day 2025', 'description' => 'A grand celebration of sports and fitness featuring inter-house competitions across 20+ sports.', 'event_date' => '2025-03-15', 'event_time' => '08:00:00', 'venue' => 'School Ground', 'category' => 'Sports', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Science Exhibition', 'description' => 'Students showcase their innovative science projects and experiments to parents and the public.', 'event_date' => '2025-04-10', 'event_time' => '10:00:00', 'venue' => 'School Auditorium', 'category' => 'Academic', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Cultural Fest - Kalai Vizha', 'description' => 'Annual cultural extravaganza showcasing dance, music, drama, and art from all grades.', 'event_date' => '2025-05-20', 'event_time' => '09:00:00', 'venue' => 'School Auditorium', 'category' => 'Cultural', 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Republic Day Celebration', 'description' => 'Patriotic event with flag hoisting, march-past, and cultural programmes.', 'event_date' => '2025-01-26', 'event_time' => '08:30:00', 'venue' => 'School Ground', 'category' => 'National', 'is_featured' => false, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Awards
        Award::insert([
            ['title' => 'State Level Mathematics Olympiad - Gold', 'description' => 'First place in State Mathematics Olympiad 2024.', 'recipient_name' => 'Aarav Sharma', 'recipient_class' => 'Class X', 'year' => 2024, 'category' => 'Academic', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'District Sports Champion - Athletics', 'description' => 'Gold medal in 100m sprint at District Level Sports Meet.', 'recipient_name' => 'Priya Devi', 'recipient_class' => 'Class IX', 'year' => 2024, 'category' => 'Sports', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Best School Award - District', 'description' => 'Awarded best school in the district for academic excellence.', 'recipient_name' => 'JMPSS', 'recipient_class' => null, 'year' => 2024, 'category' => 'Institutional', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'National Science Talent Search', 'description' => 'Selected for National Science Talent Search Examination.', 'recipient_name' => 'Karthik Raj', 'recipient_class' => 'Class VIII', 'year' => 2023, 'category' => 'Academic', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Testimonials (5 school-related)
        Testimonial::insert([
            ['name' => 'Mrs. Anitha Suresh', 'designation' => 'Parent of Grade VIII student', 'content' => 'JMPSS has transformed my child with strong academics and discipline. Teachers are approachable and the school environment is safe and encouraging.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mr. Karthikeyan R', 'designation' => 'Parent of Grade VI student', 'content' => 'We are very happy with the concept-based teaching and regular parent communication. My son is now more confident in class participation.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ms. Priyadharshini M', 'designation' => 'Alumni - Batch 2022', 'content' => 'The teachers at JMPSS gave me the right foundation for higher studies. The academic guidance and lab exposure helped me perform well in board exams.', 'rating' => 5, 'type' => 'alumni', 'passing_year' => 2022, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mrs. Lalitha Kumar', 'designation' => 'Parent of Grade IV student', 'content' => 'The school balances studies and co-curricular activities very well. My daughter enjoys learning and has improved in communication skills.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mr. Senthil Prabhu', 'designation' => 'Parent of Grade X student', 'content' => 'Board exam preparation support at JMPSS is excellent. Teachers provide close mentoring, practice schedules, and timely feedback to students.', 'rating' => 5, 'type' => 'parent', 'passing_year' => null, 'is_featured' => true, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->call([
            GallerySeeder::class,
            EventSeeder::class,
        ]);
    }
}
