@extends('admin.layouts.master')

@section('title')
SEO
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">SEO Əlavə et</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.seo.store') }}">
        @csrf        
        <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Səhifələr</label>
                <select name="type" class="form-control">
                 <option value="">choose</option>
                 <option value="1">Əsas Səhifə</option>
                 <option value="8">Haqqımızda</option>
                 <option value="3">Müəllimlər</option>
                 <option value="4">Endirimlər</option>
                 <option value="5">Vakansiyalar</option>
                 <option value="6">Bloq və Media</option>
                 <option value="7">Məzunlar</option>
                 <option value="9">Tədris sahələri</option>
                 <option value="10">Müraciət edin</option>
                 <option value="11">Sertifikat Yoxla</option>
                 <option value="2">Əlaqə</option>
                </select>
            </div>
            @error('type')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>
        </div>



        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Title</label>
                   <input type="hidden" name="title" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for=""> Meta Keywords</label>
                   <input type="hidden" name="meta_keyword" value='{"az":"","en":"","ru":""}'>
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

        
        <a href="{{ route('admin.seo.index') }}" class="btn btn-success">Back</a>
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
