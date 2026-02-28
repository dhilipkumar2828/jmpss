<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Award;
use App\Models\Testimonial;
use App\Models\HomeSection;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'galleries'    => Gallery::count(),
            'events'       => Event::count(),
            'awards'       => Award::count(),
            'testimonials' => Testimonial::count(),
            'home_sections'=> HomeSection::count(),
        ];

        $recent_events = Event::latest()->take(5)->get();
        $recent_testimonials = Testimonial::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_events', 'recent_testimonials'));
    }
}
