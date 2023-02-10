<?php

namespace App\Http\Controllers\Front;

use App\Models\Certifcat;
use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SertifkatController extends Controller
{
    public function index()
    {
        $ser_seo=Seo::where('type',11)->orderBy('id','DESC')->first();
        return view('front.pages.certificat',compact('ser_seo'));
    }

    public function search(Request $request)
    {
        $ser_seo=Seo::where('type',11)->orderBy('id','DESC')->first();
        $search=$request->query('number');
        
      $sers=Certifcat::get();
      $ser=Certifcat::where('number','LIKE',"{$search}")->first() ;
      return view('front.pages.certificat_single',compact('ser','ser_seo'));
        
    }
}
