<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::active()->paginate(9);
        return view('frontend.events', compact('events'));
    }
}
