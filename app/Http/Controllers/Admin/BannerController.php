<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'page' => 'required|string',
            // 'banner_type' => 'required|string',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['image_path'] = 'uploads/banners/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');
        
        // Default banner type if not provided
        if (!isset($data['banner_type'])) {
            $data['banner_type'] = ($data['page'] === 'home') ? 'slider' : 'page_header';
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.form', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'page' => 'required|string',
            // 'banner_type' => 'required|string',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($banner->image_path && file_exists(public_path($banner->image_path))) {
                unlink(public_path($banner->image_path));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['image_path'] = 'uploads/banners/' . $filename;
        }

        $data['is_active'] = $request->has('is_active');

        // Default banner type if not provided
        if (!isset($data['banner_type'])) {
            $data['banner_type'] = ($data['page'] === 'home') ? 'slider' : 'page_header';
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
        }
        $banner->delete();
        return back()->with('success', 'Banner deleted successfully.');
    }
}
