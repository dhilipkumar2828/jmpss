<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Annual Sports Day 2024',
                'description' => 'A day filled with athletic competitions and sportsmanship.',
                'image' => 'assets/jmpsss/image/new/env2.png',
                'event_date' => Carbon::now()->addDays(15),
                'event_time' => '09:00:00',
                'venue' => 'School Ground',
                'category' => 'Sports',
                'is_featured' => true
            ],
            [
                'title' => 'Science & Innovation Fair',
                'description' => 'Showcasing the scientific creativity of our students.',
                'image' => 'assets/jmpsss/image/new/env3.png',
                'event_date' => Carbon::now()->addDays(30),
                'event_time' => '10:00:00',
                'venue' => 'School Auditorium',
                'category' => 'Academic',
                'is_featured' => true
            ],
            [
                'title' => 'Inter-School Cultural Meet',
                'description' => 'Celebrating diverse cultures through music and dance.',
                'image' => 'assets/jmpsss/image/new/env1.png',
                'event_date' => Carbon::now()->subDays(5),
                'event_time' => '11:00:00',
                'venue' => 'Main Hall',
                'category' => 'Cultural',
                'is_featured' => false
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
