<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()  { return view('admin.gallery.index', ['galleries' => Gallery::latest()->paginate(10)]); }
    public function create() { return view('admin.gallery.form'); }

    public function store(Request $request)
    {
        $request->validate([
            'groups.*.title'       => 'required|string|max:255',
            'groups.*.category'    => 'nullable|string|max:100',
            'groups.*.description' => 'nullable|string',
            'groups.*.photos.*'    => 'nullable|image|max:10240',
            'groups.*.video_urls.*' => 'nullable|url|max:500',
        ]);

        $groupCount = 0;
        foreach ($request->input('groups', []) as $index => $group) {
            // Create ONE Gallery record (Album)
            $gallery = Gallery::create([
                'title'       => $group['title'],
                'category'    => $group['category'] ?? null,
                'description' => $group['description'] ?? null,
                'type'        => 'photo', // Default but we can handle mixed
                'is_active'   => true,
                'sort_order'  => 0,
            ]);

            // Save multiple Photos
            if ($request->hasFile("groups.$index.photos")) {
                foreach ($request->file("groups.$index.photos") as $file) {
                    $gallery->items()->create([
                        'item_type' => 'photo',
                        'file_path' => $file->store('gallery', 'public'),
                    ]);
                }
            }

            // Save multiple Video URLs
            if (isset($group['video_urls'])) {
                $urls = array_filter($group['video_urls']);
                foreach ($urls as $url) {
                    $gallery->items()->create([
                        'item_type' => 'video',
                        'video_url' => $url,
                    ]);
                }
            }
            $groupCount++;
        }

        return redirect()->route('admin.gallery.index')->with('success', "$groupCount functions added successfully!");
    }

    public function edit(Gallery $gallery) { return view('admin.gallery.form', compact('gallery')); }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
            'new_photos.*' => 'nullable|image|max:10240',
            'new_video_urls.*' => 'nullable|url|max:500',
        ]);

        $gallery->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'is_active'   => $request->boolean('is_active', true),
        ]);

        // Add new photos
        if ($request->hasFile('new_photos')) {
            foreach ($request->file('new_photos') as $file) {
                $gallery->items()->create([
                    'item_type' => 'photo',
                    'file_path' => $file->store('gallery', 'public'),
                ]);
            }
        }

        // Add new video URLs
        if ($request->filled('new_video_urls')) {
            $urls = array_filter($request->new_video_urls);
            foreach ($urls as $url) {
                $gallery->items()->create([
                    'item_type' => 'video',
                    'video_url' => $url,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Album updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete all files in storage
        foreach ($gallery->items as $item) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
        }
        
        $gallery->delete(); // Cascades to gallery_items
        return redirect()->route('admin.gallery.index')->with('success', 'Album and all its media deleted!');
    }

    public function destroyItem($id)
    {
        $item = \App\Models\GalleryItem::findOrFail($id);
        if ($item->file_path) {
            Storage::disk('public')->delete($item->file_path);
        }
        $item->delete();
        return response()->json(['success' => true]);
    }
    public function show(Gallery $gallery) { return redirect()->route('admin.gallery.edit', $gallery); }
}
