<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class GalleryController extends Controller
{
    public function index()
    {
        try {
            $photos = Gallery::active()->photos()->paginate(12, '*', 'photos');
            $videos = Gallery::active()->videos()->paginate(9, '*', 'videos');
        } catch (Throwable $e) {
            report($e);
            $photos = new LengthAwarePaginator(
                collect(),
                0,
                12,
                LengthAwarePaginator::resolveCurrentPage('photos'),
                ['path' => LengthAwarePaginator::resolveCurrentPath(), 'pageName' => 'photos']
            );
            $videos = new LengthAwarePaginator(
                collect(),
                0,
                9,
                LengthAwarePaginator::resolveCurrentPage('videos'),
                ['path' => LengthAwarePaginator::resolveCurrentPath(), 'pageName' => 'videos']
            );
        }

        return view('frontend.gallery', compact('photos', 'videos'));
    }
}
