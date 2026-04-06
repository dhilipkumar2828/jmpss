<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReplyMail;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest('id')->paginate(10);
        return view('admin.contacts.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.contacts.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return back()->with('success', 'Contact message deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $message = ContactMessage::findOrFail($id);
        try {
            Mail::to($message->email)->send(new AdminReplyMail('Contact message', $message->name, $request->message));
            return back()->with('success', 'Reply sent successfully to ' . $message->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
