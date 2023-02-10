<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::orderBy('id','DESC')->get();
        return view('admin.pages.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.pages.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sliders=new Slider;
        $data = $request->all();
        $validator = Validator::make($data, [
            'link'   => 'required',
            'img'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'link.required'=>'Zəhmət olmasa linki daxil edin',
            'img.required'=>'Zəhmət olmasa şəkili daxil edin',
            'img.mimes'=>'Şəkil png , jpg ,svg , webp formatında olmalıdır',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('img'))
        {
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/slider/'.$fileName;
            $request->img->move('image/slider/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        Slider::create($data);

        toastr()->success('Slayder məlumatarınız əlavə olundu');
        return redirect()->route('admin.slider.index');
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
        $slider=Slider::findOrFail($id);

        return view('admin.pages.slider.edit',compact('slider'));

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
        $slider=Slider::findOrFail($id);
        $data = $request->all();
        $validator = Validator::make($data, [
            'link'    => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('img'))
        {
            if(File::exists($slider->img))
            {
                File::delete($slider->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/slider/'.$fileName;
            $request->img->move('image/slider/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        $slider->update($data);

        toastr()->success('Slayder məlumatlarınız uğurla güncəlləndi');
        return redirect()->route('admin.slider.index');    
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
            $slider=Slider::findOrFail($id);
            if(File::exists($slider->img))
            {
                File::delete($slider->img);
            }
        $slider->delete();
        return response()->json([
            'message' => 'Slayderiniz uğurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
}}
