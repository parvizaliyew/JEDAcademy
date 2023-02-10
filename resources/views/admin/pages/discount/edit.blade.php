@extends('admin.layouts.master')

@section('title')
Endirimlər
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Endirimli kursu yenilə</h3>
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.discount.update',$discount->id) }}">
        @csrf
        @method("PUT")
        <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-group" for="Inputdate">Tarix</label>
                    <div class="mb-3">
                        <input name="date" value="{{ $discount->date }}" class="form-control" type="date" id="Inputdate">
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
                <input type="hidden" name="title" value='{{ $discount->title }}'>
                <input value="{{ $discount->translate('title') }}" class="form-control">
            </div>
         </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
               <div class="form-group translate">
                   <label style="font-size:20px;font-weight:500" for="">Açıqlama </label>
                   <input type="hidden" name="desc" value='{{ $discount->desc }}'>
                   <textarea id="editor"  class="form-control">{{ $discount->translate('desc') }}</textarea>
               </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-group" for="">Şəkil</label> <br>
                <img width="400px" height="300px" src="{{ asset($discount->img) }}" alt=""> 
                <div class="mb-3">
                    <br>
                    <input name="img" class="form-control" type="file" id="formFile">
                </div>
                @error('img')
                <span class="text-danger mt-2">{{ $message }}</span> 
                @enderror
            </div>
        </div>

        <a href="{{ route('admin.discount.index') }}" class="btn btn-success">Geri</a>
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
