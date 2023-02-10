@extends('admin.layouts.master')

@section('title')
Sertifikatlar
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Sertifikatı Yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.certificate.update',$ser->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Sertifikatın nömrəsi</label>
                    <input name="number" value="{{ $ser->number }}" type="text"  class="form-control"></input>
                </div>
                @error('number')
                <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
             </div>

            <div class="col-md-4">
               <div class="form-group">
                   <label for="">Növü</label>
                   <select name="type" class="form-control">
                    <option value="">Seçin</option>
                    <option @if($ser->type==1) selected  @endif value="1">Standart sertifikat</option>
                    <option @if($ser->type==2) selected  @endif value="2">Fərqlənmə sertifikat</option>
                   </select>
               </div>
               @error('type')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
             </div>
                

                <div class="col-md-4">
                    <label class="form-group" for="Inputdate">Verilmə tarixi</label>
                    <div class="mb-3">
                        <input name="date" value="{{ $ser->date }}" class="form-control" type="date" id="Inputdate">
                    </div>
                    @error('date')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>
           </div>

           <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group ">
                   <label for="">Sertifikatın sahibi</label>
                   <input name="name" value="{{ $ser->name }}" class="form-control"></input>
               </div>
               @error('name')
               <span class="text-danger mt-2">{{ $message }}</span> <br>
               @enderror
            </div>
           </div>
        <div class="row mb-3">
         <div class="col-md-12">
            <div class="form-group ">
                <label for="">Bitirdiyi kurs</label>
                <input name="course" value="{{ $ser->course }}" class="form-control"></input>
            </div>
            @error('course')
            <span class="text-danger mt-2">{{ $message }}</span> <br>
            @enderror
         </div>
        </div>
      <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-group" for="">Image</label> <br>
            <img width="400px" height="300px" src="{{ asset($ser->img) }}" alt=""> 
            <div class="mb-3">
                <br>
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
            @error('img')
            <span class="text-danger mt-2">{{ $message }}</span> 
            @enderror
        </div>
    </div>
        <a href="{{ route('admin.certificate.index') }}" class="btn btn-success">Geri</a>
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
