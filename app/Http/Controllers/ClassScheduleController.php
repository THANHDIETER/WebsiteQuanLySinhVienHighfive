<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClassScheduleController extends Controller
{
    use SoftDeletes;
    public function index()
    {
        $schedules = ClassSchedule::with(['teacher', 'course'])
        ->orderBy('created_at', 'desc')  // Sắp xếp theo cột created_at, theo thứ tự giảm dần
        ->paginate(10);
        return view('admin.class_schedules.index', compact('schedules'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('admin.class_schedules.create', compact('teachers', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'room' => 'required|string|max:255',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        ClassSchedule::create($request->all());

        return redirect()->route('admin.class_schedules.index')->with('success', 'Đã thêm lịch học.');
    }

    public function showedit($id)
    {
        $schedule = ClassSchedule::findOrFail($id);
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('admin.class_schedules.edit', compact('schedule', 'teachers', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'room' => 'required|string|max:255',
            'day_of_week' => 'required|string|max:20',
             'start_time' => 'required|date_format:H:i',
             'end_time' => 'required|date_format:H:i',
        ]);

        $schedule = ClassSchedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->route('admin.class_schedules.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy($id)
    {
        $schedule = ClassSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.class_schedules.index')->with('success', 'Đã chuyển vào thùng rác.');
    }

    public function trash()
    {
        $schedules = ClassSchedule::onlyTrashed()->with(['teacher', 'course'])->paginate(10);
        return view('admin.class_schedules.trash', compact('schedules'));
    }

    public function restore($id)
    {
        $schedule = ClassSchedule::onlyTrashed()->findOrFail($id);
        $schedule->restore();

        return redirect()->route('admin.class_schedules.trash')->with('success', 'Khôi phục thành công.');
    }
}