<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReplyMail;

class CareerApplicationController extends Controller
{
    public function index()
    {
        $applications = CareerApplication::latest('id')->paginate(10);
        return view('admin.careers.index', compact('applications'));
    }

    public function show($id)
    {
        $application = CareerApplication::findOrFail($id);
        return view('admin.careers.show', compact('application'));
    }

    public function destroy($id)
    {
        $application = CareerApplication::findOrFail($id);
        
        if ($application->resume_path && file_exists(public_path($application->resume_path))) {
            unlink(public_path($application->resume_path));
        }

        $application->delete();
        return back()->with('success', 'Career application deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $application = CareerApplication::findOrFail($id);
        try {
            Mail::to($application->email)->send(new AdminReplyMail('Career application', $application->name, $request->message));
            return back()->with('success', 'Reply sent successfully to ' . $application->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
