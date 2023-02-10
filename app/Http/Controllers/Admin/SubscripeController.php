<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subsripe;
use Illuminate\Http\Request;
use App\Exports\ExportSubsripe;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SubscripeController extends Controller
{
    public function index()
    {
        $messages=Subsripe::orderBy('id','DESC')->get();
        return view('admin.pages.subscripe.index',compact('messages'));
    }
 public function export_emails(Request $request){
        return Excel::download(new ExportSubsripe, 'email.xlsx');
    }
    
    public function delete($id)
    {
        {
            try {
                $message=Subsripe::findOrFail($id);
               
                
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
