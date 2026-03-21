<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class EventController extends Controller
{
    public function index()
    {
        try {
            $events = Event::active()->paginate(8);
        } catch (Throwable $e) {
            report($e);
            $events = new LengthAwarePaginator(
                collect(),
                0,
                8,
                LengthAwarePaginator::resolveCurrentPage(),
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
        }

        return view('frontend.events', compact('events'));
    }
}
