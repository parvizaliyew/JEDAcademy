<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacanciController extends Controller
{
    public function index()
    {
        $vacancy_seo=Seo::where('type',5)->orderBy('id','DESC')->first();
        $vacancies=Vacancy::get();
        return view('front.pages.vacancy',compact('vacancy_seo','vacancies'));
    }

    public function single($slug)
    {
        $vacancy=Vacancy::whereJsonContains('slug->az',$slug)->orWhereJsonContains('slug->en',$slug)->orWhereJsonContains('slug->ru',$slug)->first();
        return view('front.pages.vacancy_single',compact('vacancy'));
    }
}
