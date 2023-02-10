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
        <h3 class="m-0">Kursu Yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.course.update',$course->id) }}">
        @csrf
        @method("PUT")

        <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Kursun növü</label>
                <select name="type" class="form-control">
                 <option {{ $course->type==1 ? 'selected' : ""  }}  value="1">Əyani</option>
                 <option {{ $course->type==2 ? 'selected' : ""  }}  value="2">Onlayn</option>
                 <option {{ $course->type==3 ? 'selected' : ""  }}  value="3">Əyani-Onlayn</option>
                </select>
            </div>
            @error('type')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="">Ay</label>
                <input type="number" value="{{ $course->month }}" class="form-control" name="month">
            </div>

            @error('month')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror

        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="">Saat</label>
                <input type="number" value="{{ $course->hours }}" class="form-control" name="hours">
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
                   <input type="hidden" name="title" value='{{ $course->title }}'>
                   <input value="{{ $course->translate('title') }}" class="form-control">
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
                   <input type="hidden" name="sub_title" value='{{ $course->sub_title }}'>
                   <textarea  class="form-control">{{ $course->translate('sub_title') }}</textarea>
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
                      <input type="hidden" name="short_desc" value='{{ $course->short_desc }}'>
                      <textarea  class="form-control">{{ $course->translate('short_desc') }}</textarea>
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
                      <input type="hidden" name="desc" value='{{ $course->desc }}'>
                      <textarea  class="form-control">{{ $course->translate('desc') }}</textarea>
                   </div>
                  @error('desc')
                  <span class="text-danger mt-2">{{ $message }}</span> <br>
                  @enderror
               </div>
           </div>

        <div>
             <div class="row mb-3">

        @php
        $image=\App\Models\Course::where('id',$course->id)->first();
        $images=explode('|',$image->images);
        @endphp
                    <label for="">Şəkillər</label> 

        <div  class="col-md-12">
            @foreach ($images as $image)
                <div style="display: inline-flex;
    flex-direction: column;
    align-items: center;">
    @if($image)
    
    <a href="{{asset($image)}}" data-fancybox="group">
                    <img width="100px" height="100px" src="{{ asset($image) }}" alt="">
    </a> 
                 
                    <input type="hidden" name="image_ids[]" value="{{ $image }}"/>
                    <i style="font-size:26px ;cursor: pointer" class="fas fa-times text-danger"></i>
                     @endif 
                </div>            
            @endforeach
            <div class="mb-3">
                <br>
                <input name="images[]" multiple class="form-control" type="file" id="formFile">
            </div>
        @error('images')
        <span class="text-danger mt-2">{{ $message }}</span> <br>
        @enderror
        </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Meta Title</label>
                   <input type="hidden" name="meta_title" value="{{$course->meta_title}}" >
                   <input value="{{$course->translate('meta_title')}}"  class="form-control">
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Meta Keywords</label>
                   <input type="hidden" name="meta_key" value='{{$course->meta_key}}'>
                   <input value="{{$course->translate('meta_key')}}" class="form-control">
               </div>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Meta Description</label>
                   <input type="hidden" name="meta_desc" value='{{$course->meta_desc}}'>
                   <input value="{{$course->translate('meta_desc')}}" class="form-control">
               </div>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Seo Title</label>
                   <input type="hidden" name="seo_title" value='{{$course->seo_title}}'>
                   <input value="{{$course->translate('seo_title')}}" class="form-control">
               </div>
            </div>
        </div

         <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Seo Description</label>
                   <input type="hidden" name="seo_desc" value='{{$course->seo_desc}}'>
                   <input value="{{$course->translate('seo_desc')}}" class="form-control">
               </div>
            </div>
        </div></br>
        <a href="{{ route('admin.course.index') }}" class="btn btn-success">Geri</a>
        <button type="submit" class="btn btn-primary">Yenilə</button>
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
<script>
    let close = $('.fa-times');
    close.on('click',function(){
        $(this).parent().remove();
    });
</script>
@endpush
