<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\Award;
use App\Models\Testimonial;
use App\Models\HomeSection;
use App\Models\Admission;
use App\Models\CareerApplication;
use App\Models\VisitRequest;
use App\Models\ContactMessage;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'galleries'    => Gallery::count('id'),
            'events'       => Event::count('id'),
            'awards'       => Award::count('id'),
            'testimonials' => Testimonial::count('id'),
            'home_sections'=> HomeSection::count('id'),
            'admissions'   => Admission::count('id'),
            'careers'      => CareerApplication::count('id'),
            'visits'       => VisitRequest::count('id'),
            'contacts'     => ContactMessage::count('id'),
            'users'        => User::count('id'),
            'banners'      => \App\Models\Banner::count('id'),
        ];

        $recent_events = Event::latest('id')->take(5)->get();
        $recent_admissions = Admission::latest('id')->take(5)->get();
        $recent_contacts = ContactMessage::latest('id')->take(5)->get();
        $recent_users = User::latest('id')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_events', 'recent_admissions', 'recent_contacts', 'recent_users'));
    }
}
