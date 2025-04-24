<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách sinh viên
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(10); // Sắp xếp sinh viên mới nhất lên đầu
        return view('admin.students.index', compact('students'));
    }

    // Hiển thị form thêm sinh viên mới
    public function create()
    {
        return view('admin.students.create');
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_code' => 'required|unique:students|max:20',
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable',
            'address' => 'required',
        ]);

        Student::create($validated);

        return redirect()->route('admin.students.index')->with('success', 'Thêm sinh viên thành công!');
    }

    // Hiển thị form sửa thông tin sinh viên
    public function showedit(Student $student ,$id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        return view('admin.students.showedit', compact('student'));
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, $id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $validated = $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable',
            'address' => 'required',
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')->with('success', 'Cập nhật sinh viên thành công!');
    }

    // Xóa sinh viên (soft delete)
    public function destroy($id)
{
    $student = Student::findOrFail($id);
    // Xóa mềm sinh viên
    $student->delete();

    return redirect()->route('admin.students.index')->with('success', 'Xóa sinh viên thành công!');
}

public function trash()
{
    $students = Student::onlyTrashed()->get();

    return view('admin.students.trash', compact('students'));
}

    // Khôi phục sinh viên đã bị xóa mềm
    public function restore($id)
    {
        $student = Student::withTrashed()->find($id);
        $student->restore();

        return redirect()->route('admin.students.trash')->with('success', 'Khôi phục sinh viên thành công!');
    }
}
