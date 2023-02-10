<?php

namespace App\Http\Controllers\Admin;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultatingController extends Controller
{
    public function index()
    {
        $messages=Consultation::orderBy('id','DESC')->get();
        return view('admin.pages.consultation.index',compact('messages'));
    }

    public function edit($id)
    {
        $message=Consultation::findOrFail($id);
        return view('admin.pages.consultation.edit',compact('message'));
    }
    
    public function delete($id)
    {
        {
            try {
                $message=Consultation::findOrFail($id);
               
                
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
