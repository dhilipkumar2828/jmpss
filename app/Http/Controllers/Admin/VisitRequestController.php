<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Illuminate\Http\Request;

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
}
