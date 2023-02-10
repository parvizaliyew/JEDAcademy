<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis=Alumni::orderBy('id','DESC')->get();
        return view('admin.pages.alumni.index',compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni=new Alumni;
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
            $fileNameWithUpload='image/alumni/'.$fileName;
            $request->img->move('image/alumni/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        

        Alumni::create($data);

        toastr()->success('added alumni information.');
        return redirect()->route('admin.alumni.index'); 
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
        $alumni=Alumni::findOrFail($id);
        return view('admin.pages.alumni.edit',compact('alumni'));
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
        $alumni=Alumni::findOrFail($id);
        $data = $request->all();
        if($request->has('img'))
        {
            if(File::exists($alumni->img))
            {
                File::delete($alumni->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/alumni/'.$fileName;
            $request->img->move('image/alumni/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        $alumni->update($data);
        toastr()->success('updated alumni information.');
        return redirect()->route('admin.alumni.index');
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
            $alumni=Alumni::findOrFail($id);
            if(File::exists($alumni->img))
            {
                File::delete($alumni->img);
            }
        $alumni->delete();
        return response()->json([
            'message' => 'Your lider have been successfully deleted',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
    }
}
