<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::orderBy('id','DESC')->get();
        return view('admin.pages.question.index',compact('questions'));
    }

    public function create()
    {
        $courses=Course::get();
        return view('admin.pages.question.create',compact('courses'));

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
            'course_id'   => 'required',
        ],
        [
            'course_id.required'=>'Zəhmət olmasa kursu daxil edin',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Question::create($data);
        toastr()->success('Sual   məlumatarınız əlavə olundu');
        return redirect()->route('admin.question.index');
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
        $question=Question::findOrFail($id);
        $courses=Course::get();
        return view('admin.pages.question.edit',compact('question','courses'));

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
        $question=Question::findOrFail($id);
        $data = $request->all();
        $question->update($data);

        toastr()->success('sualınız  uğurla güncəlləndi');
        return redirect()->route('admin.question.index');    
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
        $question=Question::findOrFail($id);
        $question->delete();
        return response()->json([
            'message' => 'sualınız uğurla silindi',
            'code' => 204,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'code' => 500,
            ]);}}
}
