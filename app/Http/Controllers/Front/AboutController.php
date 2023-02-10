<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about_seo=Seo::where('type',8)->orderBy('id','DESC')->first();
        $galeries=Galery::orderBy('id','DESC')->get();
        return view('front.pages.about',compact('about_seo','galeries'));
    }
}
