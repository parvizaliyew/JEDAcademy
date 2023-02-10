<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function signin_post(Request $request)
    {
        $data= [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        $validator =Validator::make($data,[
        'email'=>'required|email',
        'password'=>'required',
        ]);

        if($validator->fails())
        {
            toastr()->error('Zəhmət olmasa bütün xanaları düzgün formatda doldurun.');
            return redirect()->back();
        }

        if (Auth::attempt($data))
        {
        toastr()->success('Uğurla giriş etdiniz.');
        return redirect()->route('admin.slider.index');
        }
        
        else
        {
            toastr()->error('İstifadəçi məlumatları doğru deyil.');
            return redirect()->back();
        }
    }

    public function profil_update()
    {
        return view('auth.profil_update');
    }

    public function profilupdate_post(Request $request)
    {
        $oldpassword=Auth::user()->password;
        $data=$request->all();
        $validator = Validator::make($data,[
            'email'=>'required|email',
            'name'=>'required',
        ],
        [
            'email.required'=>'Emailinizi daxil edin',
            'name.required'=>'Adınızı daxil edin',
            'email.email'=>'Emailinizi düzgün formatda deyil',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
            $user = User::find(auth()->user()->id);
            if($request->has('reset_password')){
                if($request->reset_password=='')
                {
                    $user->update($data);
                    toastr()->success('Profil məlumatlarınız yeniləndi');
                    return redirect()->back();
                }
                 if($request->reset_password == $request->confirm_password){
                    $data['password']=Hash::make($request->reset_password);
                    $user->update($data);
                    toastr()->success('Profil məlumatlarınız yeniləndi');
                    return redirect()->back();
                    }

                    else{
                        toastr()->warning('Parolunuzu təsdiqləyin');
                        return redirect()->back();
                    }  
            }}

        public function logout()
        {
            Auth::logout();
            return redirect()->route('index.'.app()->getLocale());
        }
}
