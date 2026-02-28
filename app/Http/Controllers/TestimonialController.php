<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::active()->paginate(9);
        return view('frontend.testimonials', compact('testimonials'));
    }
}
