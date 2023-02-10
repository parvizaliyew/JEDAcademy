<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::get();
        return view('admin.pages.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher=new Teacher;
        $request->all();
        $data = $request->all();
        $validator = Validator::make($data, [
            'img'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'img.required'=>'Please enter the img',
            'img.mimes'=>'The image should be in png ,jpg,svg,webp format',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('img'))
        {
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/teacher/'.$fileName;
            $request->img->move('image/teacher/',$fileName);
            $data['img']=$fileNameWithUpload;
        }

        $data['slug'] = [];
        foreach (json_decode($request->name) as $key => $name) {
            $data['slug'][$key] = Str::slug($name);
        }
        
        Teacher::create($data);

        toastr()->success('added teacher information.');
        return redirect()->route('admin.teacher.index'); 
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
        $teacher=Teacher::findOrFail($id);
        return view('admin.pages.teacher.edit',compact('teacher'));
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
        $teacher=Teacher::findOrFail($id);
        $data = $request->all();
        $validator = Validator::make($data, [
            'img'   => 'mimes:png,jpg,svg,webp',
        ],
        [
            'img.mimes'=>'The image should be in png ,jpg,svg,webp format',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if($request->has('img'))
        {
            if(File::exists($teacher->img))
            {
                File::delete($teacher->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/teacher/'.$fileName;
            $request->img->move('image/teacher/',$fileName);
            $data['img']=$fileNameWithUpload;
        }

        $data['slug'] = $teacher->slug;
        foreach (json_decode($request->name) as $key => $name) 
        {
            $data['slug'][$key] = Str::slug($name);
        }

        $teacher->update($data);
        toastr()->success('updated teacher information.');
        return redirect()->route('admin.teacher.index');
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
            $teacher=Teacher::findOrFail($id);
            if(File::exists($teacher->img))
            {
                File::delete($teacher->img);
            }
        $teacher->delete();
        return response()->json([
            'message' => 'Your Teacher have been successfully deleted',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
    }
    
}
