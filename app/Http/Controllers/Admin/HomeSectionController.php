<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    public function index()  { return view('admin.home-sections.index', ['sections' => HomeSection::orderBy('sort_order')->paginate(10)]); }
    public function create() { return view('admin.home-sections.form'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_type' => 'required|in:principal,correspondent,hero,about',
            'title'        => 'required|string|max:255',
            'name'         => 'nullable|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'content'      => 'required|string',
            'quote'        => 'nullable|string|max:500',
            'sort_order'   => 'integer|min:0',
            'is_active'    => 'boolean',
        ]);
        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $request->input('sort_order', 0);
        HomeSection::create($data);
        return redirect()->route('admin.home-sections.index')->with('success', 'Section created!');
    }

    public function edit(HomeSection $homeSection) { return view('admin.home-sections.form', ['section' => $homeSection]); }

    public function update(Request $request, HomeSection $homeSection)
    {
        $data = $request->validate([
            'section_type' => 'required|in:principal,correspondent,hero,about',
            'title'        => 'required|string|max:255',
            'name'         => 'nullable|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'content'      => 'required|string',
            'quote'        => 'nullable|string|max:500',
            'sort_order'   => 'integer|min:0',
            'is_active'    => 'boolean',
        ]);
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $request->input('sort_order', 0);
        $homeSection->update($data);
        return redirect()->route('admin.home-sections.index')->with('success', 'Section updated!');
    }

    public function destroy(HomeSection $homeSection) { $homeSection->delete(); return redirect()->route('admin.home-sections.index')->with('success', 'Section deleted!'); }
    public function show(HomeSection $homeSection)    { return redirect()->route('admin.home-sections.edit', $homeSection); }
}
