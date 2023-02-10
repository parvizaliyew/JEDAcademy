<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\WhoCourseFor;
use App\Models\Sillabus;
use App\Models\Salary;
use App\Models\Support;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses_seo=Seo::where('type',9)->orderBy('id','DESC')->first();
        $courses=Course::get();
        $questions=Question::where('course_id',0)->get();
        return view('front.pages.course',compact('courses_seo','courses','questions'));
    }
    public function single($slug)
    {
        $courses=Course::get();
        $course=Course::whereJsonContains('slug->az',$slug)->orWhereJsonContains('slug->en',$slug)->orWhereJsonContains('slug->ru',$slug)->with('teachers')->first();
        $courses1=Course::where('id','!=',$course->id)->get();
        $sillabus=Sillabus::orderBy('id','desc')->where('course_id',$course->id)->first() ?? 0;
        $salary=Salary::where('course_id',$course->id)->orderBy('id','DESC')->first();
        $alumnis=Alumni::get();
        $questions=Question::where('course_id',$course->id)->get();
        $questions_esas=Question::where('course_id',0)->get();
        $who_courses=WhoCourseFor::where('course_id',$course->id)->get();
        $supports=Support::get();
        return view('front.pages.course_single',compact('course','courses1','courses','sillabus',
        'alumnis','who_courses','salary','questions','questions_esas','supports'));    
    }
}
