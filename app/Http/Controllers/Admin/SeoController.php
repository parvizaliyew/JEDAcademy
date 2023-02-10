<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SeoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seos=Seo::orderBy('id','DESC')->get();
        return view('admin.pages.seo.index',compact('seos'));
    }

    public function create()
    {
        return view('admin.pages.seo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seo=new Seo;
        $data = $request->all();
        $validator = Validator::make($data, [
            'type'   => 'required',
        ],
        [
            'type.required'=>'Zəhmət olmasa səhifəni daxil edin',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Seo::create($data);

        toastr()->success('Seo məlumatlarınız əlavə olundu');
        return redirect()->route('admin.seo.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo=Seo::findOrFail($id);

        return view('admin.pages.seo.edit',compact('seo'));
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
        $seo=Seo::findOrFail($id);

        $seo->update($request->all());

        toastr()->success('Seo məlumatlarınız əlavə olundu');
        return redirect()->route('admin.seo.index');    
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
        $seo=Seo::findOrFail($id);
            
        $seo->delete();
        return response()->json([
            'message' => 'Your Slider have been successfully deleted',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}
}}
