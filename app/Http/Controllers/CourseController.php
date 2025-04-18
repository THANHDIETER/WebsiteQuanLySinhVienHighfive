<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.courses.index', compact('courses')); // ✅ sửa lại view
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.courses.create', compact('teachers')); // ✅ sửa lại view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string|max:50|unique:courses,course_code',
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:20',
            'description'=> 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Thêm khóa học thành công');
    }

    public function show(string $id)
    {
        $course = Course::with('teacher')->findOrFail($id);
        return view('admin.courses.show', compact('course')); // ✅ sửa lại view
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::all();
        return view('admin.courses.edit', compact('course', 'teachers')); // ✅ sửa lại view
    }

    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'course_code' => 'required|string|max:50|unique:courses,course_code,' . $id,
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:20',
            'description'=> 'nullable|string',

            'teacher_id' => 'nullable|exists:teachers,id',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Cập nhật khóa học thành công');
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        
            $course->delete();
            return redirect()->route('admin.courses.index')->with('success', 'Xóa khóa học thành công');
        
    }
    public function trash()
{
    $courses = Course::onlyTrashed()->with('teacher')->orderBy('deleted_at', 'DESC')->paginate(10);
    return view('admin.courses.trash', compact('courses'));
}

public function restore($id)
{
    $course = Course::withTrashed()->findOrFail($id);
    $course->restore();

    return redirect()->route('admin.courses.trash')->with('success', 'Khôi phục khóa học thành công');
}

public function forceDelete($id)
{
    $course = Course::withTrashed()->findOrFail($id);

    // TODO: Kiểm tra quan hệ trước khi xóa vĩnh viễn nếu cần

    $course->forceDelete();

    return redirect()->route('admin.courses.trash')->with('success', 'Đã xóa vĩnh viễn khóa học');
}
}
