<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $events = Event::active()->where('is_featured', '=', 1)->take(6)->get();
            if ($events->isEmpty()) {
                $events = Event::active()->take(6)->get();
            }
            
            $testimonials = Testimonial::active()->where('is_featured', '=', 1)->take(5)->get();
            if ($testimonials->isEmpty()) {
                $testimonials = Testimonial::active()->take(5)->get();
            }

            $homeSections = \App\Models\HomeSection::active()->orderBy('sort_order', 'asc')->get();
            $sections = [
                'hero' => $homeSections->where('section_type', 'hero')->first(),
                'about' => $homeSections->where('section_type', 'about')->first(),
                'principal' => $homeSections->where('section_type', 'principal')->first(),
                'correspondent' => $homeSections->where('section_type', 'correspondent')->first(),
            ];

            $banners = \App\Models\Banner::where('is_active', '=', true)->orderBy('sort_order', 'asc')->get();
        } catch (Throwable $e) {
            report($e);
            $events = collect();
            $testimonials = collect();
            $banners = collect();
            $sections = [
                'hero' => null,
                'about' => null,
                'principal' => null,
                'correspondent' => null,
            ];
        }

        return view('frontend.home', compact('events', 'testimonials', 'sections', 'banners'));
    }
}
