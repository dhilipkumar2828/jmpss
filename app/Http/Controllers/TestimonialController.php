<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class TestimonialController extends Controller
{
    public function index()
    {
        try {
            $testimonials = Testimonial::active()->paginate(9);
        } catch (Throwable $e) {
            report($e);
            $testimonials = new LengthAwarePaginator(
                collect(),
                0,
                9,
                LengthAwarePaginator::resolveCurrentPage(),
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
        }

        return view('frontend.testimonials', compact('testimonials'));
    }
}
