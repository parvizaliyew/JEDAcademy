@extends('admin.layouts.master')

@section('title')
Kurslar
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Kurs Əlavə et</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.store') }}">
        @csrf
        <div class="row mb-3">
        <div class="col-md-4">
            <label style="font-size:20px;
                font-weight:500;" for="">Şəkillər</label>
            <div class="mb-3">
                <input type="file" class="form-control" name="images[]" multiple />
            </div>
        @error('images')
        <span class="text-danger mt-2">{{ $message }}</span> <br>
        @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Kursun növü</label>
                <select name="type" class="form-control">
                 <option value="">choose</option>
                 <option value="1">Əyani</option>
                 <option value="2">Onlayn</option>
                 <option value="3">Əyani-Onlayn</option>
                </select>
            </div>
            @error('type')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="">Ay</label>
                <input type="number" class="form-control" name="month">
            </div>

            @error('month')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror

        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="">Saat</label>
                <input type="number" class="form-control" name="hours">
            </div>

            @error('hours')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Başlıq</label>
                   <input type="hidden" name="title" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
               @error('title')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>
        
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Alt Başlıq</label>
                <input type="hidden" name="sub_title" value='{"az":"","en":"","ru":""}'>
                <textarea  class="form-control"></textarea>
            </div>
            @error('sub_title')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
         </div>
        </div>



        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Qısa açıqlama</label>
                   <input type="hidden" name="short_desc" value='{"az":"","en":"","ru":""}'>
                   <textarea  class="form-control"></textarea>
                </div>
               @error('short_desc')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Açıqlama</label>
                   <input type="hidden" name="desc" value='{"az":"","en":"","ru":""}'>
                   <textarea  class="form-control"></textarea>
                </div>
               @error('desc')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Meta Title</label>
                   <input type="hidden" name="meta_title" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Meta Keywords</label>
                   <input type="hidden" name="meta_key" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Meta Description</label>
                   <input type="hidden" name="meta_desc" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Seo Title</label>
                   <input type="hidden" name="seo_title" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div

         <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Seo Description</label>
                   <input type="hidden" name="seo_desc" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>

        <a href="{{ route('admin.course.index') }}" class="btn btn-success">Back</a>
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
