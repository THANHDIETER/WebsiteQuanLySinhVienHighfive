<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        $examResults = ExamResult::with(['student', 'course'])->orderBy('exam_date', 'desc')->paginate(10);
        return view('admin.exam_results.index', compact('examResults'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('admin.exam_results.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'exam_type' => 'required|in:Midterm,Final,Quiz',
            'score' => 'required|numeric|min:0|max:10',
            'exam_date' => 'required|date',
        ]);

        ExamResult::create($validated);

        return redirect()->route('admin.exam_results.index')->with('success', 'Thêm kết quả thi thành công');
    }

    public function show(string $id)
    {
        $examResult = ExamResult::with(['student', 'course'])->findOrFail($id);
        return view('admin.exam_results.show', compact('examResult'));
    }

    public function edit(string $id)
    {
        $examResult = ExamResult::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('admin.exam_results.edit', compact('examResult', 'students', 'courses'));
    }

    public function update(Request $request, string $id)
    {
        $examResults = ExamResult::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'exam_type' => 'required|in:Midterm,Final,Quiz',
            'score' => 'required|numeric|min:0|max:10',
            'exam_date' => 'required|date',
        ]);

        $examResults->update($validated);

        return redirect()->route('admin.exam_results.index')->with('success', 'Cập nhật kết quả thi thành công');
    }

    public function destroy(string $id)
    {
        
        
        $examResult = ExamResult::findOrFail($id);
         $examResult->delete();
         return redirect()->route('admin.exam_results.index')->with('success', 'Exam result deleted successfully.');
           
    }
    public function trash()
    {
        $examResults = ExamResult::onlyTrashed()->with(['student', 'course'])->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('admin.exam-results.trash', compact('examResults'));
        
    }
    public function restore($id)
    {
        $examResult = ExamResult::withTrashed()->findOrFail($id);
        $examResult->restore();
        return redirect()->route('admin.exam_results.index')->with('success', 'Exam result restored.');
    }

    public function forceDelete($id)
    {
        $examResult = ExamResult::withTrashed()->findOrFail($id);
        $examResult->forceDelete();
        return redirect()->route('admin.exam_results.index')->with('success', 'Exam result permanently deleted.');
    }
}
