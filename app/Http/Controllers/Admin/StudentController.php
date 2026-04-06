<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BulkNotificationMail;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $standards = Category::select('standard')->distinct()->get();
        if ($request->filled('standard')) {
            $sections = Category::where('standard', $request->standard)->select('section')->distinct()->get();
        } else {
            $sections = Category::select('section')->distinct()->get();
        }
        
        $query = Student::with('category')->latest('id');

        if ($request->filled('standard')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('standard', $request->standard);
            });
        }

        if ($request->filled('section')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('section', $request->section);
            });
        }

        if ($request->filled('search')) {
            $query->where('child_name', 'like', '%' . $request->search . '%');
        }

        $students = $query->paginate(20);

        return view('admin.students.index', compact('students', 'standards', 'sections'));
    }

    public function create()
    {
        $standards = Category::select('standard')->distinct()->pluck('standard');
        return view('admin.students.create', compact('standards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_name' => 'required',
            'father_name' => 'required',
            'father_mobile' => 'required',
            'mother_name' => 'required',
            'mother_mobile' => 'required',
            'category_id' => 'required|exists:categories,id',
            'email' => 'nullable|email',
        ]);

        Student::create($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student = Student::with('category')->findOrFail($id);
        $standards = Category::select('standard')->distinct()->pluck('standard');
        $current_standard = $student->category->standard;
        $sections = Category::where('standard', $current_standard)->get();
        
        return view('admin.students.edit', compact('student', 'standards', 'sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'child_name' => 'required',
            'father_name' => 'required',
            'father_mobile' => 'required',
            'mother_name' => 'required',
            'mother_mobile' => 'required',
            'category_id' => 'required|exists:categories,id',
            'email' => 'nullable|email',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }

    public function getSections($standard)
    {
        $standards = explode(',', $standard);
        
        // If it's a single standard, return IDs for the student registration form
        if (count($standards) === 1) {
            $categories = Category::where('standard', $standards[0])->get(['id', 'section']);
            return response()->json($categories);
        }

        // If multiple standards, return distinct section names for the bulk mail filter
        $sections = Category::whereIn('standard', $standards)
            ->select('section')
            ->distinct()
            ->orderBy('section')
            ->get();
        return response()->json($sections);
    }

}
