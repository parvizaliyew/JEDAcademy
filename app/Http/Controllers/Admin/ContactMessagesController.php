<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;

class ContactMessagesController extends Controller
{
    public function index()
    {
        $messages=ContactMessage::orderBy('id','DESC')->get();
;
       
        return view('admin.pages.message.index',compact('messages'));
    }

    public function edit($id)
    {
        $message=ContactMessage::findOrFail($id);
        return view('admin.pages.message.edit',compact('message'));
    }
    
    public function delete($id)
    {
        {
            try {
                $message=ContactMessage::findOrFail($id);
               
                
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
