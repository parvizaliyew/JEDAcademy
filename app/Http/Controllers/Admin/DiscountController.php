<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts=Discount::orderBy('id','DESC')->get();
        return view('admin.pages.discount.index',compact('discounts'));
    }

    public function create()
    {
        return view('admin.pages.discount.create');

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
            'date'   => 'required',
            'img'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'date.required'=>'Zəhmət olmasa son qeydiyyat tarixin  daxil edin',
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
            $fileNameWithUpload='image/discount/'.$fileName;
            $request->img->move('image/discount/',$fileName);
            $data['img']=$fileNameWithUpload;
        }

        $data['slug'] = [];
        foreach (json_decode($request->title) as $key => $title) {
            $data['slug'][$key] = Str::slug($title);
        }
        
        Discount::create($data);

        toastr()->success('Endirim məlumatarınız əlavə olundu');
        return redirect()->route('admin.discount.index');
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
        $discount=Discount::findOrFail($id);

        return view('admin.pages.discount.edit',compact('discount'));

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
        $discount=Discount::findOrFail($id);
        $data = $request->all();
        
        if($request->has('img'))
        {
            if(File::exists($discount->img))
            {
                File::delete($discount->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/discount/'.$fileName;
            $request->img->move('image/discount/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        $data['slug'] = $discount->slug;
        foreach (json_decode($request->title) as $key => $title) 
        {
            $data['slug'][$key] = Str::slug($title);
        }
        $discount->update($data);

        toastr()->success('Endirimlər məlumatlarınız uğurla güncəlləndi');
        return redirect()->route('admin.discount.index');    
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
            $discount=Discount::findOrFail($id);
            if(File::exists($discount->img))
            {
                File::delete($discount->img);
            }
        $discount->delete();
        return response()->json([
            'message' => 'Endiriminiz uğurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
