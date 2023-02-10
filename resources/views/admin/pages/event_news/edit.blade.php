@extends('admin.layouts.master')

@section('title')
Bloq və Media
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Bloq və Media Yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.news-event.update',$news_event->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <div class="col-md-6">
               <div class="form-group">
                   <label for="">Növü</label>
                   <select name="type" class="form-control">
                    <option {{ $news_event->type===1 ? 'selected' : 'null' }}  value="1">News</option>
                    <option {{ $news_event->type===0 ? 'selected' : 'null' }} value="0">Event</option>
                   </select>
               </div>
             </div>
                
                <div class="col-md-6">
                    <label class="form-group" for="Inputdate">Tarix</label>
                    <div class="mb-3">
                        <input value="{{ $news_event->date }}" name="date" class="form-control" type="date" id="Inputdate">
                    </div>
                    @error('date')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>
           </div>
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Başlıq</label>
                <input type="hidden" name="title" value='{{ $news_event->title }}'>
                <input value="{{ $news_event->translate('title') }}" class="form-control">
            </div>
            @error('title')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
         </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Qısa Açıqlama</label>
                   <input type="hidden" name="short_desc" value='{{ $news_event->short_desc }}'>
                   <textarea   class="form-control" >{{ $news_event->translate('short_desc') }}</textarea>
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
                   <input type="hidden" name="desc" value='{{ $news_event->desc }}'>
                   <textarea id="editor"  class="form-control"> {{ $news_event->translate('desc') }}</textarea>
               </div>
               @error('short_desc')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>
        <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-group" for="">Şəkil</label> <br> <br>
            <img width="400px" height="300px" src="{{ asset($news_event->img) }}" alt=""> 
            <div class="mb-3">
                <br>
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
        </div>
        </div>

        <a href="{{ route('admin.news-event.index') }}" class="btn btn-success">Geri</a>
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
@endpush
