@extends('admin.layouts.master')

@section('title')
Sillabus
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Sillabus Əlavə et</h3>
        </div>
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <div class="lang">
                    <a href="az" class="btn btn-success active">Az</a>
                    <a href="en" class="btn btn-success">En</a>
                    <a href="ru" class="btn btn-success">Ru</a>
                </div>
            </nav>
        </div>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sillabus.store') }}">
        @csrf
        <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label  style="font-size:20px;font-weight:500"  for="">Kursu Seçin </label>
                <select name="course_id" class="form-control">
                 <option value="">Seçin</option>
                 @foreach ($courses as $item)
                 <option value="{{ $item->id }}">{{ $item->translate('title') }}</option>
                 @endforeach
                </select>
            </div>
            @error('course_id')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror   
          </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">1-ci ay </label>
                   <input type="hidden" name="month_1" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">2-ci ay </label>
                   <input type="hidden" name="month_2" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor1"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">3-cü ay </label>
                   <input type="hidden" name="month_3" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor2"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">4-cü ay </label>
                   <input type="hidden" name="month_4" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor3"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">5-ci ay </label>
                   <input type="hidden" name="month_5" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor4"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">6-cı ay </label>
                   <input type="hidden" name="month_6" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor5"  class="form-control"></textarea>
               </div>
               
            </div>
        </div>
        

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">7-ci ay </label>
                   <input type="hidden" name="month_7" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor6"  class="form-control"></textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">8-ci ay </label>
                   <input type="hidden" name="month_8" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor7"  class="form-control"></textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">9-cu ay </label>
                   <input type="hidden" name="month_9" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor8"  class="form-control"></textarea>
               </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">10-cu ay </label>
                   <input type="hidden" name="month_10" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor9"  class="form-control"></textarea>
               </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">11-ci ay </label>
                   <input type="hidden" name="month_11" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor10"  class="form-control"></textarea>
               </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">12-ci ay </label>
                   <input type="hidden" name="month_12" value='{"az":"","en":"","ru":""}'>
                   <textarea id="editor11"  class="form-control"></textarea>
               </div>
            </div>
        </div>

        <a href="{{ route('admin.sillabus.index') }}" class="btn btn-success">Geri</a>
        <button type="submit" class="btn btn-primary">Əlavə et</button>
        </form>
        </div>
        </div>
        </div>
        </div>
</div>
</div>

@endsection

@push('js')
<script src="{{ asset('manager/js/translate.js') }}"></script>
<script src="{{ asset('manager/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('manager/js/cketditor.js') }}"></script>
@endpush
