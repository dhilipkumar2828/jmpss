<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()  { return view('admin.testimonials.index', ['testimonials' => Testimonial::latest()->paginate(10)]); }
    public function create() { return view('admin.testimonials.form'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'content'      => 'required|string',
            'rating'       => 'required|integer|min:1|max:5',
            'type'         => 'required|in:student,parent,alumni,staff',
            'passing_year' => 'nullable|integer|min:1900|max:2100',
            'is_featured'  => 'boolean',
            'is_active'    => 'boolean',
        ]);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added!');
    }

    public function edit(Testimonial $testimonial) { return view('admin.testimonials.form', compact('testimonial')); }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'content'      => 'required|string',
            'rating'       => 'required|integer|min:1|max:5',
            'type'         => 'required|in:student,parent,alumni,staff',
            'passing_year' => 'nullable|integer|min:1900|max:2100',
            'is_featured'  => 'boolean',
            'is_active'    => 'boolean',
        ]);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
    }

    public function destroy(Testimonial $t) { $t->delete(); return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted!'); }
    public function show(Testimonial $t)    { return redirect()->route('admin.testimonials.edit', $t); }
}
