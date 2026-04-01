<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Event::active();

            // Search Filter
            if ($request->has('search') && $request->search != '') {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('venue', 'like', "%{$search}%");
                });
            }

            // Category Filter
            if ($request->has('category') && $request->category != '') {
                $query->where('category', $request->category);
            }

            $events = $query->latest('event_date')->paginate(8)->withQueryString();
            
            // Recent Events for Sidebar (Always latest regardless of search, or reflecting current filters?) 
            // Usually Sidebar shows absolute latest.
            $recentEvents = Event::active()->latest('event_date')->take(3)->get();
            
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
