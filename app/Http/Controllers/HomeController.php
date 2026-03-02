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

    public function about() { return view('frontend.about'); }
    public function academics() { return view('frontend.academics'); }
    public function admissions() { return view('frontend.admissions'); }
    public function infrastructure() { return view('frontend.infrastructure'); }
    public function results() { return view('frontend.results'); }
    public function news() { return view('frontend.news'); }
    public function disclosure() { return view('frontend.disclosure'); }
    public function contact() { return view('frontend.contact'); }
}
