<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReplyMail;

class VisitRequestController extends Controller
{
    public function index()
    {
        $requests = VisitRequest::latest('id')->paginate(10);
        return view('admin.visits.index', compact('requests'));
    }

    public function show($id)
    {
        $visit = VisitRequest::findOrFail($id);
        return view('admin.visits.show', compact('visit'));
    }

    public function destroy($id)
    {
        $request = VisitRequest::findOrFail($id);
        $request->delete();
        return back()->with('success', 'Visit request deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $visit = VisitRequest::findOrFail($id);
        try {
            Mail::to($visit->email)->send(new AdminReplyMail('Visit request', $visit->name, $request->message));
            return back()->with('success', 'Reply sent successfully to ' . $visit->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
