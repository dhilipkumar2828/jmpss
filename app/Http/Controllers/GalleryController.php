<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Throwable;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get Galleries (Albums) that have at least one photo
            $query = Gallery::active()->whereHas('items', function($q) {
                $q->where('item_type', 'photo');
            })->with(['items' => function($q) {
                $q->where('item_type', 'photo');
            }]);
            
            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }

            $albums = $query->paginate(12)->withQueryString();
            $categories = Gallery::active()->pluck('category')->unique()->filter();
        } catch (Throwable $e) {
            report($e);
            $albums = collect();
            $categories = collect();
        }

        return view('frontend.gallery', compact('albums', 'categories'));
    }

    public function videos(Request $request)
    {
        try {
            // Get Galleries (Albums) that have at least one video
            $query = Gallery::active()->whereHas('items', function($q) {
                $q->where('item_type', 'video');
            })->with(['items' => function($q) {
                $q->where('item_type', 'video');
            }]);
            
            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }

            $albums = $query->paginate(9)->withQueryString();
            $categories = Gallery::active()->pluck('category')->unique()->filter();
        } catch (Throwable $e) {
            report($e);
            $albums = collect();
            $categories = collect();
        }

        return view('frontend.videos', compact('albums', 'categories'));
    }
}
