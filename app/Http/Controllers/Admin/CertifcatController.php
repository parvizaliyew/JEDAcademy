<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certifcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class CertifcatController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sers=Certifcat::orderBy('id','DESC')->get();
        return view('admin.pages.certifcat.index',compact('sers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.certifcat.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ser=new Certifcat;
        $data = $request->all();
        $validator = Validator::make($data, [
            'type'    => 'required',
            'date' => 'required',
            'name' => 'required',
            'number' => 'required',
            'course' => 'required',
            'img'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'name.required'=>'zəhmət olmasa kursun sahibin daxil edin',
            'date.required'=>'zəhmət olmasa verilmə tarixin daxil edin',
            'type.required'=>'zəhmət olmasa sertifikatın növün daxil edin',
            'number.required'=>'zəhmət olmasa Sertifikatın nömrəsini  daxil edin',
            'course.required'=>'zəhmət olmasa Kursu daxil edin',
            'img.required'=>'Zəhmət olmasa şəkili daxil',
            'img.mimes'=>'Şəkil png, jpg , svg , webp formatında olmalıdır',
        ]
    );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

         if($request->has('img'))
        {
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/certifcat/'.$fileName;
            $request->img->move('image/certifcat/',$fileName);
            $data['img']=$fileNameWithUpload;
        }
     
    

        Certifcat::create($data);

        toastr()->success('Sertifikat məlumatlarınız yeniləndi');
        return redirect()->route('admin.certificate.index');
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
        $ser=Certifcat::findOrFail($id);
        return view('admin.pages.certifcat.edit',compact('ser'));
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
        $ser=Certifcat::findOrFail($id);
        $data = $request->all();

        if($request->has('img'))
        {
            if(File::exists($ser->img))
            {
                File::delete($ser->img);
            }
            $ext=$request->img->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/certifcat/'.$fileName;
            $request->img->move('image/certifcat/',$fileName);
            $data['img']=$fileNameWithUpload;

        }

        $ser->update($data);      
        toastr()->success('Sertifkat məlumatlarınız yeniləndi');
        return redirect()->route('admin.certificate.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
            try {
                $ser=Certifcat::findOrFail($id);
                 if(File::exists($ser->img))
                {
                    File::delete($ser->img);
                }
               $ser->delete();
            return response()->json([
                'message' => 'Sertifikat ugurla silindi',
                'code' => 204,
            ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'code' => 500,
                ]);}
    }
}
