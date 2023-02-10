@extends('admin.layouts.master')

@section('title')
Proqramçı nə qədər maaş alır?
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Proqramçı nə qədər maaş alır? yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.salary.update',$salary->id) }}">
        @csrf
        @method("PUT")
       <div class="row mb-3">
        <div class="col-md-4">
            <label class="form-group" for="">Kurslar</label> <br>
            <select class="form-control"   name="course_id">
                <option value="">Kursu Seçin</option>
                @foreach ($courses as $item)
                <option @if($salary->course_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->translate('title') }}</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Başlıq</label>
                <input type="hidden" name="title" value='{{$salary->title}}'>
                <input value="{{$salary->translate('title')}}"  class="form-control">
            </div>
         </div>
        </div>

        <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Junior</label>
                <input type="text" value="{{$salary->junior}}" class="form-control" name="junior">
            </div>
            @error('junior')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Middle</label>
                <input type="text" class="form-control" value="{{$salary->middle}}" name="middle">
            </div>
            @error('middle')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Senior</label>
                <input type="text" class="form-control" value="{{$salary->senior}}" name="senior">
            </div>
            @error('senior')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Junior açıqlama</label>
                <input type="hidden" name="junior_desc" value='{{$salary->junior_desc}}'>
                <input value="{{$salary->translate('junior_desc')}}"  class="form-control">
            </div>
         </div>
        </div>

<div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Midlle açıqlama</label>
                <input type="hidden" name="middle_desc" value='{{$salary->middle_desc}}'>
                <input value="{{$salary->translate('middle_desc')}}"  class="form-control">
            </div>
         </div>
    </div>


    <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group translate">
                <label for="">Senior açıqlama</label>
                <input type="hidden" name="senior_desc" value='{{$salary->senior_desc}}'>
                <input value="{{$salary->translate('senior_desc')}}"  class="form-control">
            </div>
         </div>
    </div>

        

        

        <a href="{{ route('admin.salary.index') }}" class="btn btn-success">Geri</a>
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
