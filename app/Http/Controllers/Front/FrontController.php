<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\Galery;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\NewsEvent;
use App\Models\Question;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $index_seo=Seo::where('type',1)->orderBy('id','DESC')->first();
        $sliders=Slider::get();
        $courses=Course::get();
        $alumnis=Alumni::orderBy('id','DESC')->get();
        $teachers=Teacher::orderBy('id','DESC')->get();
        $galeries=Galery::orderBy('id','DESC')->get();
        $questions=Question::where('course_id',0)->get();
        $blogs=NewsEvent::orderBy('id','desc')->get();
        $supports=Support::get();

        return view('front.pages.index',compact('index_seo','supports','sliders','courses','alumnis','teachers','galeries','blogs','questions'));
    }

}
