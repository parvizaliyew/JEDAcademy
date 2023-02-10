<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries=Salary::orderBy('id','DESC')->get();
        return view('admin.pages.salary.index',compact('salaries'));
    }

    public function create()
    {
        $courses=Course::get();
        return view('admin.pages.salary.create',compact('courses'));

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
            'junior'   => 'required',
            'senior'   => 'required',
            'middle'   => 'required',
            'course_id'   => 'required',
        ],
        [
            'junior.required'=>'Zəhmət olmasa son junior maasin  daxil edin',
            'middle.required'=>'Zəhmət olmasa son middle maasin  daxil edin',
            'senior.required'=>'Zəhmət olmasa son senior maasin  daxil edin',
            'course_id.required'=>'Zəhmət olmasa son Kursu  daxil edin',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        
        Salary::create($data);

        toastr()->success('Proqramçı maaşı  məlumatarınız əlavə olundu');
        return redirect()->route('admin.salary.index');
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
        $salary=Salary::findOrFail($id);
        $courses=Course::get();
        return view('admin.pages.salary.edit',compact('salary','courses'));

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
        $salary=Salary::findOrFail($id);
        $data = $request->all();
        $salary->update($data);

        toastr()->success('Maaş məlumatlarınız uğurla güncəlləndi');
        return redirect()->route('admin.salary.index');    
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
            $salary=Salary::findOrFail($id);
            
        $salary->delete();
        return response()->json([
            'message' => 'Maaş uğurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
