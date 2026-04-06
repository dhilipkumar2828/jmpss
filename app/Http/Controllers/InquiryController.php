<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\CareerApplication;
use App\Models\VisitRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminInquiryMail;
use App\Mail\CustomerInquiryMail;

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

        $admission = Admission::create($request->all());

        // Send Emails
        try {
            Mail::to(config('mail.from.address'))->send(new AdminInquiryMail('Admission', $request->all()));
            Mail::to($request->email)->send(new CustomerInquiryMail('Admission', $request->all()));
        } catch (\Exception $e) {
            // Log error or handle silently
        }

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

        $application = CareerApplication::create($data);

        // Send Emails
        try {
            Mail::to(config('mail.from.address'))->send(new AdminInquiryMail('Career', $data));
            Mail::to($request->email)->send(new CustomerInquiryMail('Career', $data));
        } catch (\Exception $e) {
            // Log error or handle silently
        }

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

        $visit = VisitRequest::create($request->all());

        // Send Emails
        try {
            Mail::to(config('mail.from.address'))->send(new AdminInquiryMail('Campus Visit', $request->all()));
            Mail::to($request->email)->send(new CustomerInquiryMail('Campus Visit', $request->all()));
        } catch (\Exception $e) {
            // Log error or handle silently
        }

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

        $contact = ContactMessage::create($request->all());

        // Send Emails
        try {
            Mail::to(config('mail.from.address'))->send(new AdminInquiryMail('Contact', $request->all()));
            Mail::to($request->email)->send(new CustomerInquiryMail('Contact', $request->all()));
        } catch (\Exception $e) {
            // Log error or handle silently
        }

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
