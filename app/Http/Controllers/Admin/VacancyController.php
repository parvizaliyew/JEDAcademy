<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vacancy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies=Vacancy::orderBy('id','DESC')->get();
        return view('admin.pages.vacancy.index',compact('vacancies'));
    }

    public function create()
    {
        return view('admin.pages.vacancy.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacancy=new Vacancy;
        $data = $request->all();
        $validator = Validator::make($data, [
            'logo'   => 'required|mimes:png,jpg,svg,webp',
        ],
        [
            'logo.required'=>'Zəhmət olmasa logonu daxil edin',
            'logo.mimes'=>'Logo png , jpg ,svg , webp formatında olmalıdır',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->has('logo'))
        {
            $ext=$request->logo->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/vacancy/'.$fileName;
            $request->logo->move('image/vacancy/',$fileName);
            $data['logo']=$fileNameWithUpload;
        }

        $data['slug'] = [];
        foreach (json_decode($request->name) as $key => $name) {
            $data['slug'][$key] = Str::slug($name);
        }
        
        Vacancy::create($data);

        toastr()->success('Vakansiya məlumatarınız əlavə olundu');
        return redirect()->route('admin.vacancy.index');
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
        $vacancy=Vacancy::findOrFail($id);

        return view('admin.pages.vacancy.edit',compact('vacancy'));
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
        $vacancy=Vacancy::findOrFail($id);
        $data = $request->all();
        if($request->has('logo'))
        {
            if(File::exists($vacancy->logo))
            {
                File::delete($vacancy->logo);
            }
            $ext=$request->logo->extension();
            $fileName=rand(1,100).time().'.'.$ext;
            $fileNameWithUpload='image/vacancy/'.$fileName;
            $request->logo->move('image/vacancy/',$fileName);
            $data['logo']=$fileNameWithUpload;
        }

        $data['slug'] = $vacancy->slug;
        foreach (json_decode($request->name) as $key => $name) 
        {
            $data['slug'][$key] = Str::slug($name);
        }

        $vacancy->update($data);

        toastr()->success('Vakansiya məlumatlarınız uğurla güncəlləndi');
        return redirect()->route('admin.vacancy.index');    
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
            $vacancy=Vacancy::findOrFail($id);
            if(File::exists($vacancy->logo))
            {
                File::delete($vacancy->logo);
            }
        $vacancy->delete();
        return response()->json([
            'message' => 'Vakansiyanız uğurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
