@extends('admin.layouts.master')

@section('title')
Müəllimlər
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Müəllimi Yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.teacher.update',$teacher->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Ad</label>
                <input type="hidden" name="name" value='{{ $teacher->name }}'>
                <input  class="form-control" value="{{ $teacher->translate('name') }}">
            </div>
         </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Vəzifə</label>
                   <input type="hidden" name="position" value='{{ $teacher->position }}'>
                   <input  class="form-control" value="{{ $teacher->translate('position') }}">
               </div>
               @error('position')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
           </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Açıqlama</label>
                   <input type="hidden" name="desc" value='{{ $teacher->desc }}'>
                   <textarea  class="form-control">{{ $teacher->translate('desc') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Şirkət</label>
                   <input type="hidden" name="company_name" value='{{ $teacher->company_name }}'>
                   <textarea  class="form-control">{{ $teacher->translate('company_name') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-group" for="">Şəkil</label> <br>
            <img width="400px" height="300px" src="{{ asset($teacher->img) }}" alt=""> 
            <div class="mb-3">
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
            @error('img')
            <span class="text-danger mt-2">{{ $message }}</span> 
            @enderror
        </div>
        </div>

        <a href="{{ route('admin.teacher.index') }}" class="btn btn-success">Geri</a>
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
