<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\CareerApplication;
use App\Models\VisitRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function admission(Request $request)
    {
        $request->validate([
            'student_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'dob' => 'required|date',
            'grade_applying' => 'required|string',
            'parent_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|numeric|digits:10',
            'whatsapp' => 'nullable|numeric|digits:10',
            'address' => 'nullable|string',
        ]);

        Admission::create($request->all());

        return back()->with('success', 'Admission enquiry submitted successfully!');
    }

    public function career(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255',
            'position_applied' => 'required|string',
            'experience' => 'nullable|numeric',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/resumes'), $filename);
            $data['resume_path'] = 'uploads/resumes/' . $filename;
        }

        CareerApplication::create($data);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function visit(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|numeric|digits:10',
            'visit_date' => 'required|date',
            'visit_time' => 'nullable|string',
            'purpose' => 'nullable|string',
        ]);

        VisitRequest::create($request->all());

        return back()->with('success', 'Campus visit scheduled successfully!');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|numeric|digits:10',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
