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
            $events = Event::active()->take(8)->get();
            $testimonials = Testimonial::active()->take(5)->get();
        } catch (Throwable $e) {
            // Let the static frontend render even when DB is not configured.
            report($e);
            $events = new Collection();
            $testimonials = new Collection();
        }

        return view('frontend.home', compact('events', 'testimonials'));
    }
}
