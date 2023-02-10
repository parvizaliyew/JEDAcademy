<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterMessage;
use App\Models\Course;

class RegisterController extends Controller
{
    public function index()
    {
        $messages=RegisterMessage::orderBy('id','DESC')->get();
        return view('admin.pages.register_message.index',compact('messages'));
    }

    public function edit($id)
    {
        $message=RegisterMessage::findOrFail($id);
        $course=Course::where('id',$message->course_id)->first();
        return view('admin.pages.register_message.edit',compact('message','course'));
    }
    
    public function delete($id)
    {
        {
            try {
                $message=RegisterMessage::findOrFail($id);
               
                
            $message->delete();
            return response()->json([
                'message' => 'Messaj ugurla silindi',
                'code' => 204,
            ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'code' => 500,
                ]);}}
    }
}
