<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\RegisterMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterMessageController extends Controller
{
    public function index()
    {
        $register_seo=Seo::where('type',10)->orderBy('id','DESC')->first();
        $courses=Course::get();
        return  view('front.pages.register',compact('register_seo','courses'));
    }

    public function index_id($id)
    {
        $register_seo=Seo::where('type',10)->orderBy('id','DESC')->first();
        $courses=Course::get();
        
        return  view('front.pages.register',compact('register_seo','courses','id'));
    }

    

    public function register_post(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'course_id'=>'required',

        ],
        [
            'name.required' =>'Zəhmət olmasa adınızı daxil edin',
            'email.required'    =>'Zəhmət olmasa emailinizi daxil edin',
            'phone.required'    =>'Zəhmət olmasa nömrənizi daxil edin',
            'course_id.required'    =>'Zəhmət olmasa kursu daxil edin',
        ]);



        if($validator->fails()){
            return  redirect()->back()->withErrors($validator);
        }
            $message = new RegisterMessage;
            $message->name    = $request->name;
            $message->fname    = $request->fname;
            $message->email    = $request->email;
            $message->phone   = $request->phone;
            $message->course_id     = $request->course_id;
            
            $email = "info@jedacademy.az";
            $title= 'JED Academy saytından Qeydiyyat sorğusu';

            $course=Course::where('id',$request->course_id)->first();

            $course=$course->translate('title');
    
            $data = [
                'phone'  => $request->phone,
                'name'  => $request->name,
                'email'  => $request->email,
                'course'  => $course,
            ];
            Mail::send('mail.register_mail', $data, function($m) use ($title,$email) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $m->to($email, env('MAIL_FROM_NAME') )->subject($title);
            });
            
                $message->save();
                toastr()->success('Mesajınız uğurla göndərildi');
                return redirect()->back();
    }
    
}
