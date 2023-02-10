@extends('admin.layouts.master')

@section('title')
Müəllim Kurs Əlaqə
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Müəllim Kurs Əlaqə əlavə et</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.teacher-course.store') }}">
        @csrf
        <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-group" for="">Müəllim</label> <br>
                <select class="form-control"  name="teacher_id"  id="">
                    <option value="">Müəllimi Seçin</option>
                    @foreach ($teachers as $item)
                    <option value="{{ $item->id }}">{{ $item->translate('name') }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="form-group" for="">Kurslar</label> <br>
                <select class="form-control" multiple   name="course_id[]">
                    <option value="">Kursu Seçin</option>
                    @foreach ($courses as $item)
                    <option value="{{ $item->id }}">{{ $item->translate('title') }}</option>
                    @endforeach
                </select>
                @error('course_id')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
              </div>
        </div>
        <a href="{{ route('admin.teacher-course.index') }}" class="btn btn-success">Back</a>
        <button type="submit" class="btn btn-primary">Add</button>
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
