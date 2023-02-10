<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    public function index()
    {
        $teacher_seo=Seo::where('type',3)->orderBy('id','DESC')->first();
        $teachers=Teacher::orderBy('id','DESC')->get();
        $questions=Question::where('course_id',0)->get();
        return view('front.pages.teacher',compact('teacher_seo','teachers','questions'));
    }

    public function single($slug)
    {
        $questions=Question::where('course_id',0)->get();
        $teacher=Teacher::with('courses')->whereJsonContains('slug->az',$slug)->orWhereJsonContains('slug->en',$slug)->orWhereJsonContains('slug->ru',$slug)->first();
        return view('front.pages.teacher_single',compact('teacher','questions'));
    }
}
