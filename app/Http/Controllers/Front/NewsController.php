<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news_seo=Seo::where('type',6)->orderBy('id','DESC')->first();
        $blogs=NewsEvent::where('type',1)->get();
        return view('front.pages.news',compact('news_seo','blogs'));
    }

    public function single($slug)
    {
        $blog=NewsEvent::whereJsonContains('slug->az',$slug)->orWhereJsonContains('slug->en',$slug)->orWhereJsonContains('slug->ru',$slug)->first();
        $blogs=NewsEvent::where('type',1)->take('4')->get();

       $seen=$blog->seen;

       $blog->seen=$seen+1;
       $blog->save();
       return view('front.pages.news_single',compact('blog','blogs'));
    }
}
