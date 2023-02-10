<?php

namespace App\Http\Controllers\Front;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contact_seo=Seo::where('type',2)->orderBy('id','DESC')->first();
        return view('front.pages.contact',compact('contact_seo'));
    }

    public function contact_post(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'msj'=>'required',
            'phone'=>'required',
        ],
        [
            'name.required' =>'Zəhmət olmasa adınızı daxil edin',
            'phone.required'    =>'Zəhmət olmasa nömrənizi daxil edin',
            'msj.required'=>'Zəhmət olmasa mesajınızı daxil edin',
        ]);



        if($validator->fails()){
            return  redirect()->back()->withErrors($validator);
        }
            $message = new ContactMessage;
            $message->name    = $request->name;
            $message->phone   = $request->phone;
            $message->msj     = $request->msj;
    
            $email = "info@jedacademy.az";
            $title= 'JED Academy saytından Əlaqə sorğusu';
    
            $data = [
                'phone'  => $request->phone,
                'name'  => $request->name,
                'msj'  => $request->msj,
            ];
            Mail::send('mail.sendmail', $data, function($m) use ($title,$email) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $m->to($email, env('MAIL_FROM_NAME') )->subject($title);
            });
            
                $message->save();
                toastr()->success('Mesajınız uğurla göndərildi');
                return redirect()->back()->with('message','Mesajınız uğurla göndərildi.');
    }
}
