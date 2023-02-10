@extends('admin.layouts.master')

@section('title')
Bu Kurs Kimlər Üçündür 
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Bu Kurs Kimlər Üçündür? </h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course-for.update',$w_course->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
                
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Kursu Seçin </label>
                        <select name="course_id" class="form-control">
                         @foreach ($courses as $item)
                         <option @if ($item->id==$w_course->course_id)
                             'selected'
                         @else
                             ''
                         @endif value="{{ $item->id }}">{{ $item->translate('title') }}</option>
                         @endforeach
                        </select>
                    </div>
                    @error('course_id')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                  </div>
           </div>
        </div>
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Başlıq</label>
                <input type="hidden" name="title" value='{{ $w_course->title }}'>
                <input value="{{ $w_course->translate('title') }}"  class="form-control">
            </div>
            @error('title')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
         </div>
        </div>



        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-group" for="">Logo</label> <br>
                <img width="400px" height="300px" src="{{ asset($w_course->logo) }}" alt=""> 
                <div class="mb-3">
                    <br>
                    <input name="logo" class="form-control" type="file" id="formFile">
                </div>
                @error('logo')
                <span class="text-danger mt-2">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        </div>
        <a href="{{ route('admin.course-for.index') }}" class="btn btn-success">Geri</a>
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
