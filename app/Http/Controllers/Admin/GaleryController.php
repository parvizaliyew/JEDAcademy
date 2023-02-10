<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries=Galery::orderBy('id','DESC')->get();
        return view('admin.pages.galeries.index',compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.galeries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galery=new Galery;
        $data = $request->all();
        $validator = Validator::make($data, [
            'img'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'img.required'=>'Zəhmət olmasa şəkili daxil',
            'img.mimes'=>'Şəkil png, jpg , svg , webp formatında olmalıdır',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('img'))
        {
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/galery/'.$fileName;
            $request->img->move('image/galery/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
        Galery::create($data);

        toastr()->success('Qalery Əlavə olundu');
        return redirect()->route('admin.galery.index');
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
        $galery=Galery::findOrFail($id);

        return view('admin.pages.galeries.edit',compact('galery'));
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
        $galery=Galery::findOrFail($id);
        $data=$request->all();
        $validator = Validator::make($data, [
            'img'   => 'mimes:png,jpg,svg,webp',
        ],
        [
            'img.mimes'=>'Şəkil png, jpg , svg , webp formatında olmalıdır',
        ]);

        if($validator->fails())
        {
             return redirect()->back()->withErrors($validator);
        }

        if($request->has('img'))
        {
            if(File::exists($galery->img))
            {
                File::delete($galery->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(0,100).time().'.'.$ext;
            $fileNameWithUpload='image/galery/'.$fileName;
            $request->img->move('image/galery/',$fileName);
            $data['img']=$fileNameWithUpload;
        }

        
        $galery->update($data);
        toastr()->success('Qaleri yeniləndi');
        return redirect()->route('admin.galery.index');
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
            $galery=Galery::findOrFail($id);
            if(File::exists($galery->img))
            {
                File::delete($galery->img);
            }
        $galery->delete();
        return response()->json([
            'message' => 'Your Galery have been successfully deleted',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
    }
}
