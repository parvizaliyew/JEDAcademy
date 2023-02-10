<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountsController extends Controller
{
    public function index()
    {

        $discounts=Discount::orderBy('date','DESC')->get();
        $discount_seo=Seo::where('type',4)->orderBy('id','DESC')->first();

        return view('front.pages.discount',compact('discounts','discount_seo'));
    }

    public function single($slug)
    {
        $discount=Discount::whereJsonContains('slug->az',$slug)->orWhereJsonContains('slug->en',$slug)->orWhereJsonContains('slug->ru',$slug)->first();
        return view('front.pages.discount_single',compact('discount'));
    }
}
