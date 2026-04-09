<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Testimonial;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackAcknowledgment;
use App\Mail\AdminFeedbackNotification;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $events = Event::active()->where('is_featured', '=', 1)->take(12)->get();
            if ($events->isEmpty()) {
                $events = Event::active()->take(12)->get();
            }
            
            $testimonials = Testimonial::active()->where('is_featured', '=', 1)->take(5)->get();
            if ($testimonials->isEmpty()) {
                $testimonials = Testimonial::active()->take(5)->get();
            }

            $homeSections = \App\Models\HomeSection::active()->orderBy('sort_order', 'asc')->get();
            $sections = [
                'hero' => $homeSections->where('section_type', 'hero')->first(),
                'about' => $homeSections->where('section_type', 'about')->first(),
                'principal' => $homeSections->where('section_type', 'principal')->first(),
                'correspondent' => $homeSections->where('section_type', 'correspondent')->first(),
            ];
            $banners = \App\Models\Banner::where('page', '=', 'home')
                ->where('banner_type', '=', 'slider')
                ->active()
                ->orderBy('sort_order', 'asc')
                ->get();
        } catch (Throwable $e) {
            report($e);
            $events = collect();
            $testimonials = collect();
            $banners = collect();
            $sections = [
                'hero' => null,
                'about' => null,
                'principal' => null,
                'correspondent' => null,
            ];
        }

        return view('frontend.home', compact('events', 'testimonials', 'sections', 'banners'));
    }

    public function feedback()
    {
        return view('frontend.feedback');
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|size:10',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:10',
            'profile_photo' => 'nullable|image|max:2048',
        ], [
            'name.regex' => 'The name may only contain letters and spaces.',
            'mobile.size' => 'The mobile number must be exactly 10 digits.',
        ]);

        $photoPath = null;
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/feedback_photos'), $fileName);
            $photoPath = 'uploads/feedback_photos/' . $fileName;
        }

        $feedback = Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'rating' => $request->rating,
            'message' => $request->feedback,
            'photo_path' => $photoPath,
        ]);

        try {
            Mail::to($feedback->email)->send(new FeedbackAcknowledgment($feedback));
            Mail::to(config('mail.from.address'))->send(new AdminFeedbackNotification($feedback));
        } catch (Throwable $e) {
            report($e);
        }

        return redirect()->back()->with('success', 'Thank you for your valuable feedback!');
    }
}
