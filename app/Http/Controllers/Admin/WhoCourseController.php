<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\WhoCourseFor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WhoCourseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $w_courses=WhoCourseFor::orderBy('id','DESC')->get();
        return view('admin.pages.for_course.index',compact('w_courses'));
    }

    public function create()
    {
        $courses=Course::get();
        return view('admin.pages.for_course.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sliders=new WhoCourseFor;
        $data = $request->all();
        $validator = Validator::make($data, [
            'course_id'   => 'required',
            'logo'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'course_id.required'=>'Zətmət olmasa kursu daxil edin',
            'logo.required'=>'Zətmət olmasa logo-nu daxil edin',
            'logo.mimes'=>'Logo png , jpg , svg , webp formatında olmalıdır',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('logo'))
        {
            $ext=$request->logo->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/course_for/'.$fileName;
            $request->logo->move('image/course_for/',$fileName);
            $data['logo']=$fileNameWithUpload;
        }
        WhoCourseFor::create($data);

        toastr()->success('Bu kurs kimin üçündür əlavə olundu');
        return redirect()->route('admin.course-for.index');
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
        $w_course=WhoCourseFor::findOrFail($id);
        $courses=Course::get();
        return view('admin.pages.for_course.edit',compact('w_course','courses'));

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
        $w_course=WhoCourseFor::findOrFail($id);
        $data = $request->all();
       

        if($request->has('logo'))
        {
            if(File::exists($w_course->logo))
            {
                File::delete($w_course->logo);
            }
            $ext=$request->logo->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/course_for/'.$fileName;
            $request->logo->move('image/course_for/',$fileName);
            $data['logo']=$fileNameWithUpload;
        }
        $w_course->update($data);

        toastr()->success('Bu kurs kimin üçündür əlavə olundu');
        return redirect()->route('admin.course-for.index');    
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
            $w_course=WhoCourseFor::findOrFail($id);
            if(File::exists($w_course->logo))
            {
                File::delete($w_course->logo);
            }
        $w_course->delete();
        return response()->json([
            'message' => 'Bu kurs kimin üçündür silindi.',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
