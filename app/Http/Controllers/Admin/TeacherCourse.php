<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherCourse extends Controller
{
    public function index(Request $request)
    {
        $teachers_course=CourseTeacher::get();
        return view('admin.pages.teacher_course.index',compact('teachers_course')); 
    }

    public function create()
    {
        $teachers=Teacher::get();
        $courses=Course::get();
        return view('admin.pages.teacher_course.create',compact('teachers','courses'));
    }

    public function store(Request $request)
    {
        $course=new CourseTeacher;
        $data = $request->all();
        $validator = Validator::make($data, [
            'course_id'   => 'required',
            'teacher_id'   => 'required',
        ],
        [
            'course_id.required'=>'Zəhmət olmasa kursu daxil edin',
            'teacher_id.required'=>'Zəhmət olmasa müəllimi daxil edin',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $teacher_id=$request->teacher_id;
        $teacher=Teacher::findOrFail($teacher_id);
        $teacher->courses()->attach($request->course_id);
        return redirect()->route('admin.teacher-course.index');
    }

    public function delete($id)
    {
        try {
            $course_teacher=CourseTeacher::findOrFail($id);
            
        $course_teacher->delete();
        return response()->json([
            'message' => 'Kurs Müəllim əlaqəniniz silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
    }
    
}
