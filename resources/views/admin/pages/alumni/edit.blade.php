@extends('admin.layouts.master')

@section('title')
Məzunlar
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Məzun Yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.alumni.update',$alumni->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group translate">
                    <label for="">Ad</label>
                    <input type="hidden" name="name" value='{{ $alumni->name }}'>
                    <input  class="form-control" value="{{ $alumni->translate('name') }}">
                </div>
             </div>
            <div class="col-md-6">
               <div class="form-group translate">
                   <label for="">Vəzifə</label>
                   <input type="hidden" name="position" value='{{ $alumni->position }}'>
                   <input  class="form-control" value="{{ $alumni->translate('position') }}">
               </div>
            </div>

            
           </div>

         
           <div class="row mb-3">
            <div class="col-md-6">
               <div class="form-group ">
                   <label for="">Linkedin</label>
                   <input type="text" class="form-control" name="ln" value='{{ $alumni->ln }}'>
               </div>
            
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="">Facebook</label>  
                    <input type="text" class="form-control" name="fb" value='{{ $alumni->fb }}'>
                </div>
             </div>
           </div>
           <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group translate">
                    <label for="">Açıqlama</label>
                    <input type="hidden" name="desc" value='{{ $alumni->desc }}'>
                    <textarea  id="editor" class="form-control">{{ $alumni->translate('desc') }}</textarea>
                </div>
                
             </div>
           </div>   

        <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-group" for="">Şəkil</label> <br>
            <img width="400px" height="300px" src="{{ asset($alumni->img) }}" alt=""> 
            <div class="mb-3">
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
            @error('img')
            <span class="text-danger mt-2">{{ $message }}</span> 
            @enderror
        </div>
        </div>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-success">Geri</a>
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
