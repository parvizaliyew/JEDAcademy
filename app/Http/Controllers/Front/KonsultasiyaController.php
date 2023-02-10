<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Consultation;

class KonsultasiyaController extends Controller
{

   public function kon_post(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'number'=>'required',
        ],
        [
            'name.required' =>'Zəhmət olmasa adınızı daxil edin',
            'number.required'    =>'Zəhmət olmasa nömrənizi daxil edin',
        ]);



        if($validator->fails()){
            return  redirect()->back()->withErrors($validator);
        }
            $message = new Consultation;
            $message->name    = $request->name;
            $message->number   = $request->number;
    
            $email = "eliyevperviz466@gmail.com";
            $title= 'JED Academy saytından Konsultasiya sorğusu';
    
            $data = [
                'number'  => $request->number,
                'name'  => $request->name,
            ];
            Mail::send('mail.kons', $data, function($m) use ($title,$email) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $m->to($email, env('MAIL_FROM_NAME') )->subject($title);
            });
            
                $message->save();
                toastr()->success('Mesajınız uğurla göndərildi');
                return redirect()->back();
    }
}
