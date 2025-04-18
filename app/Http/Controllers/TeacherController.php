<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_code' => 'required|unique:teachers|max:20',
            'full_name'    => 'required|max:100',
            'email'        => 'required|email|unique:teachers',
            'phone'        => 'required|max:15',
            'department'   => 'required',
        ]);

        Teacher::create($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Thêm giảng viên thành công');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'teacher_code' => 'required|max:20|unique:teachers,teacher_code,' . $id,
            'full_name'    => 'required|max:100',
            'email'        => 'required|email|unique:teachers,email,' . $id,
            'phone'        => 'required|max:15',
            'department'   => 'required',
        ]);

        $teacher->update($request->all());

        return redirect()->route('admin.teachers.index')->with('success', 'Cập nhật giảng viên thành công');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Xoá giảng viên thành công');
    }
    public function show($id)
{
    $teacher = Teacher::findOrFail($id);
    return view('admin.teachers.show', compact('teacher'));
}

}
