<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

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
}
