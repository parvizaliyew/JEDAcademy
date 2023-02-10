<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports=Support::orderBy('id','DESC')->get();
        return view('admin.pages.support.index',compact('supports'));
    }

    public function create()
    {
        $courses=Course::get();
        return view('admin.pages.support.create',compact('courses'));
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
       
        Support::create($data);

        toastr()->success('Karyera dəstəyi əlavə olundu');
        return redirect()->route('admin.support.index');
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
        $support=Support::findOrFail($id);
        $courses=Course::get();
        return view('admin.pages.support.edit',compact('support','courses'));

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
        $support=Support::findOrFail($id);
        $data = $request->all();

        $support->update($data);

        toastr()->success('Karyera dəstəyi yenilendi');
        return redirect()->route('admin.support.index');    
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
            $support=Support::findOrFail($id);
            $support->delete();
        return response()->json([
            'message' => 'Karyera dəstəyi silindi.',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
