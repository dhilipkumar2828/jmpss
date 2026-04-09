<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackResponseMail;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest('id')->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        if (!$feedback->is_read) {
            $feedback->update(['is_read' => true]);
        }
        return view('admin.feedback.show', compact('feedback'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return back()->with('success', 'Feedback record deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $feedback = Feedback::findOrFail($id);

        try {
            // Update feedback with response
            $feedback->update([
                'admin_response' => $request->message,
                'responded_at' => now()
            ]);

            // Send response email to customer
            Mail::to($feedback->email)->send(new FeedbackResponseMail($feedback, $request->message));
            
            return redirect()->route('admin.feedback.index')->with('success', 'Reply sent successfully to ' . $feedback->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
