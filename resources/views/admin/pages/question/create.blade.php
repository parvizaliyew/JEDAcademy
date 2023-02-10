@extends('admin.layouts.master')

@section('title')
Tez-tez verilən suallar
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Tez-tez verilən sual əlavə et</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.question.store') }}">
        @csrf
       
       <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-group" for="">Kurslar</label> <br>
            <select class="form-control"   name="course_id">
                <option value="">Kursu Seçin</option>
                <option value="0">Əsas suallar</option>
                @foreach ($courses as $item)
                <option value="{{ $item->id }}">{{ $item->translate('title') }}</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
          </div>
        </div
        </div>

        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Sual</label>
                <input type="hidden" name="title" value='{"az":"","en":"","ru":""}'>
                <input  class="form-control">
            </div>
         </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label for="">Cavab</label>
                   <input type="hidden" name="desc" value='{"az":"","en":"","ru":""}'>
                   <input  class="form-control">
               </div>
            </div>
        </div>


        <a href="{{ route('admin.question.index') }}" class="btn btn-success">Geri</a>
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
