<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::active()->photos()->paginate(12, '*', 'photos');
        $videos = Gallery::active()->videos()->paginate(9, '*', 'videos');
        return view('frontend.gallery', compact('photos', 'videos'));
    }
}
