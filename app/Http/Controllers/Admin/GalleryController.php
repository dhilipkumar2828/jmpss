<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()  { return view('admin.gallery.index', ['galleries' => Gallery::latest()->paginate(15)]); }
    public function create() { return view('admin.gallery.form'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:photo,video',
            'file'        => 'nullable|image|max:5120',
            'video_url'   => 'nullable|url|max:500',
            'category'    => 'nullable|string|max:100',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ]);
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('gallery', 'public');
        }
        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $request->input('sort_order', 0);
        unset($data['file']);
        Gallery::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item added!');
    }

    public function edit(Gallery $gallery) { return view('admin.gallery.form', compact('gallery')); }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:photo,video',
            'file'        => 'nullable|image|max:5120',
            'video_url'   => 'nullable|url|max:500',
            'category'    => 'nullable|string|max:100',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ]);
        if ($request->hasFile('file')) {
            if ($gallery->file_path) Storage::disk('public')->delete($gallery->file_path);
            $data['file_path'] = $request->file('file')->store('gallery', 'public');
        }
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $request->input('sort_order', 0);
        unset($data['file']);
        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated!');
    }

    public function destroy(Gallery $gallery) {
        if ($gallery->file_path) Storage::disk('public')->delete($gallery->file_path);
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted!');
    }
    public function show(Gallery $gallery) { return redirect()->route('admin.gallery.edit', $gallery); }
}
