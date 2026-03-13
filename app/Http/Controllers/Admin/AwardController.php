<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()   { return view('admin.awards.index', ['awards' => Award::latest()->paginate(10)]); }
    public function create()  { return view('admin.awards.form'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'recipient_name' => 'nullable|string|max:255',
            'recipient_class'=> 'nullable|string|max:100',
            'year'           => 'required|integer|min:1900|max:2100',
            'category'       => 'nullable|string|max:100',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        Award::create($data);
        return redirect()->route('admin.awards.index')->with('success', 'Award created!');
    }

    public function edit(Award $award) { return view('admin.awards.form', compact('award')); }

    public function update(Request $request, Award $award)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'recipient_name' => 'nullable|string|max:255',
            'recipient_class'=> 'nullable|string|max:100',
            'year'           => 'required|integer|min:1900|max:2100',
            'category'       => 'nullable|string|max:100',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $award->update($data);
        return redirect()->route('admin.awards.index')->with('success', 'Award updated!');
    }

    public function destroy(Award $award) { $award->delete(); return redirect()->route('admin.awards.index')->with('success', 'Award deleted!'); }
    public function show(Award $award)    { return redirect()->route('admin.awards.edit', $award); }
}
