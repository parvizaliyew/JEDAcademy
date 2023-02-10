@extends('admin.layouts.master')

@section('title')
Vakansiya
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Vakansiya-nı yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.vacancy.update',$vacancy->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group translate">
                        <label for="">Vakansiya</label>
                        <input type="hidden" name="name"  value='{{ $vacancy->name }}'>
                        <input value="{{ $vacancy->translate('name') }}" class="form-control">
                    </div>
                 </div>
           </div>
     


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Açıqlama</label>
                   <input type="hidden" name="desc" value='{{ $vacancy->desc }}'>
                   <textarea  class="form-control">{{ $vacancy->translate('desc') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">İş barədə məlumat</label>
                   <input type="hidden" name="job_info" value='{{ $vacancy->job_info }}'>
                   <textarea id="editor"  class="form-control">{{ $vacancy->translate('job_info') }}</textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">Namizəd üçün tələblər</label>
                   <input type="hidden" name="nam_req" value='{{ $vacancy->nam_req }}'>
                   <textarea id="editor1"  class="form-control">{{ $vacancy->translate('nam_req') }}</textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">Müraciət üçün</label>
                   <input type="hidden" name="request" value='{{ $vacancy->request }}'>
                   <textarea id="editor2"  class="form-control">{{ $vacancy->translate('request') }}</textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-group" for="">Logo</label> <br> <br>
                <img width="400px" height="300px" src="{{ asset($vacancy->logo) }}" alt=""> 
                <div class="mb-3">
                    <br>
                    <input name="logo" class="form-control" type="file" id="formFile">
                </div>
            </div>
            </div>

        <a href="{{ route('admin.vacancy.index') }}" class="btn btn-success">Geri</a>
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
