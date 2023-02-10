<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Sillabus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SillabusController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sillabuss=Sillabus::orderBy('id','DESC')->get();
        return view('admin.pages.sillabus.index',compact('sillabuss'));
    }

    public function create()
    {
        $courses=Course::get();
        return view('admin.pages.sillabus.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'course_id'   => 'required',
        ],
        [
            'course_id.required'=>'Zətmət olmasa kursu daxil edin',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Sillabus::create($data);

        toastr()->success('Sillabus məlumatlarınız uğurla əlavə olundu');
        return redirect()->route('admin.sillabus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sillabus=Sillabus::findOrFail($id);
        $courses=Course::get();
        return view('admin.pages.sillabus.edit',compact('sillabus','courses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sillabus=Sillabus::findOrFail($id);
        $data = $request->all();
        $sillabus->update($data);

        toastr()->success('Sillabus məlumatlari güncəlləndi.');
        return redirect()->route('admin.sillabus.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $sillabus=Sillabus::findOrFail($id);
            
        $sillabus->delete();
        return response()->json([
            'message' => 'Silabusunuz ugurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
