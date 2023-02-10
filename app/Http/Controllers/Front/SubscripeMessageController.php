<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subsripe;
use Illuminate\Support\Facades\Mail;

class SubscripeMessageController extends Controller
{
    public function subscripe_post(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required',
        ]);


        if($validator->fails()){
           toastr()->error('Zəhmət olmasa emailinizi daxil edin ');
            return  redirect()->back();
        }
            $message = new Subsripe;
            $email = "info@jedacademy.az";
            $title= 'JED Academy saytından Abunəlik sorğusu';

            $message->email    = $request->email;

            $data = [
                'email'  => $request->email,
            ];
            Mail::send('mail.subscripe', $data, function($m) use ($title,$email) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $m->to($email, env('MAIL_FROM_NAME') )->subject($title);
            });
            
                $message->save();
                toastr()->success('Abunəlik sorğunuz qəbul edildi.');
                return redirect()->back();
    }
}
