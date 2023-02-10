<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting=Setting::first();
        return view('admin.pages.setting.index',compact('setting'));
    }

         public function aktiv(Request $request)
    {
        $id=$request->id;

        $setting=Setting::findOrFail($id);

        if($setting->teacher_aktiv===1)
        {
            $setting->teacher_aktiv=0;
            $setting->save();    
        }
        else
        {
            $setting->teacher_aktiv=1;
            $setting->save(); 
        }
        return response()->json([
            'result' => 1,
        ]);

    }

    public function update(Request $request, $id)
    {
        $setting=Setting::findOrFail($id);
        $data = $request->all();
        $setting->update($data);
        toastr()->success('Updated contact  information.');
        return redirect()->route('admin.setting.index');  
    }
}
