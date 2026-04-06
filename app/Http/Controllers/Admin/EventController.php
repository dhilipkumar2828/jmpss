<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\BulkNotificationMail;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        $allEvents = Event::where('is_active', true)
            ->orderBy('title')
            ->get()
            ->unique(function ($item) {
                return $item->title . $item->event_date;
            });
        $standards = Category::select('standard')->distinct()->pluck('standard');
        $sections = Category::select('section')->distinct()->pluck('section');
        return view('admin.events.index', compact('events', 'allEvents', 'standards', 'sections'));
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

    public function sendBulkMail(Request $request)
    {
        $request->validate([
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        $standard_array = $request->input('standards', []);
        $section_array = $request->input('sections', []);

        // Build query to find target students
        $query = Student::whereNotNull('email');
        if (!empty($standard_array) && is_array($standard_array)) {
            $query->whereHas('category', function($q) use ($standard_array) {
                $q->whereIn('standard', $standard_array);
            });
        }
        if (!empty($section_array) && is_array($section_array)) {
            $query->whereHas('category', function($q) use ($section_array) {
                $q->whereIn('section', $section_array);
            });
        }
        
        $students = $query->get();

        if (count($students) == 0) {
            return back()->with('error', 'No students found with email addresses in the selected filters.');
        }

        // Handle Event IDs from dropdown (multiple)
        $dropdown_event_ids = $request->input('event_ids_dropdown', []);
        $selected_checkbox_ids = $request->input('event_ids', []);
        
        // Merge both sources of event IDs
        $all_event_ids = array_unique(array_merge($dropdown_event_ids, $selected_checkbox_ids));

        $eventDetails = '';
        if (!empty($all_event_ids)) {
            $events = Event::whereIn('id', $all_event_ids)->get();
            if(count($events) > 0) {
                // Determine subject if it wasn't manually provided or if we're switching logic
                $subject = $request->subject;
                if (!empty($dropdown_event_ids) && count($dropdown_event_ids) > 0) {
                    if (count($dropdown_event_ids) == 1) {
                        $subject = $events->where('id', $dropdown_event_ids[0])->first()->title;
                    } else {
                        $subject = "School Events Update";
                    }
                }

                $eventDetails .= "<br><br><strong>Upcoming Events:</strong><ul>";
                foreach($events as $event) {
                    $date = \Carbon\Carbon::parse($event->event_date)->format('d M Y');
                    $eventDetails .= "<li><strong>{$event->title}</strong> (Date: {$date})<br>{$event->description}</li>";
                }
                $eventDetails .= "</ul>";
            }
        } else {
            $subject = $request->subject ?? 'School Update';
        }
        
        $finalMessage = $request->message . $eventDetails;
        
        $successCount = 0;
        $failedCount = 0;

        foreach ($students as $student) {
            if (filter_var($student->email, FILTER_VALIDATE_EMAIL)) {
                try {
                    Mail::to($student->email)->send(new BulkNotificationMail($subject, $student->child_name, $finalMessage));
                    $successCount++;
                } catch (\Exception $e) {
                    \Log::error("Failed to send bulk email to: " . $student->email . " Error: " . $e->getMessage());
                    $failedCount++;
                }
            } else {
                $failedCount++;
            }
        }

        $msg = "Emails sent successfully to {$successCount} students.";
        if ($failedCount > 0) {
            $msg .= " Failed to send to {$failedCount} invalid or rejected addresses.";
        }

        return back()->with('success', $msg);
    }
}
