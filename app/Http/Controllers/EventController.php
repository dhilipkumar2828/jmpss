<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Banner;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventController extends Controller
{
    public function index()
    {
        try {
            $events = Event::active()->paginate(8);
            
            // Recent Events for Sidebar
            $recentEvents = Event::active()->latest()->take(3)->get();
            
            // Categories for Sidebar
            $categories = Event::active()
                ->whereNotNull('category')
                ->select('category', DB::raw('count(*) as count'))
                ->groupBy('category')
                ->get();

            // Page Banner
            $pageBanner = Banner::where('page', 'events')->where('is_active', true)->first();

        } catch (Throwable $e) {
            report($e);
            $events = new LengthAwarePaginator(
                collect(),
                0,
                8,
                LengthAwarePaginator::resolveCurrentPage(),
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
            $recentEvents = collect();
            $categories = collect();
            $pageBanner = null;
        }

        return view('frontend.events', compact('events', 'recentEvents', 'categories', 'pageBanner'));
    }
}
