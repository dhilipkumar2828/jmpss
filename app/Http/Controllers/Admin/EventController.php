<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:10240',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable',
            'venue'       => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:100',
            'highlights'  => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/events'), $filename);
            $data['image'] = 'uploads/events/' . $filename;
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:10240',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable',
            'venue'       => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:100',
            'highlights'  => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/events'), $filename);
            $data['image'] = 'uploads/events/' . $filename;
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function show(Event $event) { return redirect()->route('admin.events.edit', $event); }
}
