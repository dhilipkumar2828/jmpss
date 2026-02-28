<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Award;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $principal   = HomeSection::ofType('principal')->active()->first();
        $correspondent = HomeSection::ofType('correspondent')->active()->first();
        $events      = Event::active()->featured()->take(4)->get();
        $awards      = Award::active()->take(6)->get();
        $testimonials = Testimonial::active()->featured()->take(6)->get();
        $galleries   = Gallery::active()->photos()->take(8)->get();

        return view('frontend.home', compact(
            'principal', 'correspondent', 'events', 'awards', 'testimonials', 'galleries'
        ));
    }
}
