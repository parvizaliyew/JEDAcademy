<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::orderBy('id','DESC')->get();
        return view('admin.pages.course.index',compact('courses'));
    }

    public function create()
    {
        return view('admin.pages.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course=new Course;
        $data = $request->all();
        $validator = Validator::make($data, [
            'type'   => 'required',
            'month'   => 'required',
            'hours'   => 'required',
        ],
        [
            'type.required'=>'Please enter the type',
            'month.required'=>'Please enter the month',
            'hours.required'=>'Please enter the hours',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $images=[];
       if($request->has('images'))
       {
            foreach($request->images as $file )
        {
            $ext=$file->extension();
            $fileName=$file->getClientOriginalName();
            $fileNameWithUpload='image/course/'.$fileName;
            $file->move('image/course/',$fileName);
            $images[]=$fileNameWithUpload;
        }
       }
        $data['images']=implode('|',$images);

        $data['slug'] = [];
        foreach (json_decode($request->title) as $key => $title) {
            $data['slug'][$key] = Str::slug($title);
        }
        Course::create($data);

        toastr()->success('added course information.');
        return redirect()->route('admin.course.index');
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
        $course=Course::findOrFail($id);
        return view('admin.pages.course.edit',compact('course'));
        
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
        $course=Course::findOrFail($id);
                $data = $request->all();
             $request->image_ids;

        if($request->image_ids!='')
        {
            $images = array_filter($request->image_ids,function($id) use($course){
            return Str::contains($course->images,$id);
        });
        }
      
if ($request->has('images'))
{
        foreach($request->images as $file )
        {
            $ext=$file->extension();
            $fileName=$file->getClientOriginalName();
            $fileNameWithUpload='image/course/'.$fileName;
            $file->move('image/course/',$fileName);
          
            $images[]=$fileNameWithUpload;

        }


}
           if(isset($images))
           {
               $data['images']=implode('|',$images);
           }

         $data['slug'] = $course->slug;
        foreach (json_decode($request->title) as $key => $title) 
        {
            $data['slug'][$key] = Str::slug($title);
        }

        $course->update($data);

        toastr()->success('Kurs məlumatları güncəlləndi');
        return redirect()->back();    
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
            $course=Course::findOrFail($id);
           
            $images=explode('|',$course->images);   
            foreach ($images as $key => $value) {
                if(File::exists($value))
            {
                File::delete($value);
            }
            }
            
        $course->delete();
        return response()->json([
            'message' => 'Your Course have been successfully deleted',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
}
}
