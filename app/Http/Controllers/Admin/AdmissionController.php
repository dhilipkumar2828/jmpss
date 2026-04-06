<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReplyMail;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::latest('id')->paginate(10);
        return view('admin.admissions.index', compact('admissions'));
    }

    public function show($id)
    {
        $admission = Admission::findOrFail($id);
        return view('admin.admissions.show', compact('admission'));
    }

    public function destroy($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->delete();
        return back()->with('success', 'Admission record deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $admission = Admission::findOrFail($id);

        try {
            Mail::to($admission->email)->send(new AdminReplyMail('Admission', $admission->parent_name ?? $admission->student_name, $request->message));
            return back()->with('success', 'Reply sent successfully to ' . $admission->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
