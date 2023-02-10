<?php

namespace App\Http\Controllers\Front;
use App\Models\Seo;
use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class GraduatesController extends Controller
{
    public function index()
    {
        $graduates_seo=Seo::where('type',7)->orderBy('id','DESC')->first();
        $graduates_seo=Seo::where('type',7)->orderBy('id','DESC')->first();
        $questions=Question::where('course_id',0)->get();
        $alumnis=Alumni::get();
        return view('front.pages.graduates',compact('graduates_seo','alumnis','questions'));
    }

    
}
