@extends('admin.layouts.master')

@section('title')
Slayder
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Slayder Əlavə et</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.slider.store') }}">
        @csrf
        <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-group" for="">Şəkil</label>
                    <div class="mb-3">
                        <input name="img" class="form-control" type="file" id="formFile">
                    </div>
                    @error('img')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-group" for="link">Link</label>
                    <div class="mb-3">
                        <input name="link" class="form-control" type="text" id="link">
                    </div>
                    @error('link')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>
           </div>
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Başlıq</label>
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
                   <label for="">Açıqlama</label>
                   <input type="hidden" name="desc" value='{"az":"","en":"","ru":""}'>
                   <textarea  class="form-control"></textarea>
                </div>
               @error('desc')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
        </div>

        <a href="{{ route('admin.slider.index') }}" class="btn btn-success">Geri</a>
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
