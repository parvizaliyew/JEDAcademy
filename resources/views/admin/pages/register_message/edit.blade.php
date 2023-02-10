@extends('admin.layouts.master')

@section('title')
Mesaj
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        </div>
        </div>
        <div class="white_card_body">
        <div class="card-body">
           <div class="row mb-3">
         <div class="col-md-6">
            <div class="form-group translate">
                <label style="font-size:24px" for="">Göndərilmə Tarixi :</label>
           {{ \Carbon\Carbon::parse($message->created_at->addHours(4))->format('d.m.Y H:i:s')}}
            </div>
        </div>
        </div>
        <div class="row mb-3">
         <div class="col-md-6">
            <div class="form-group translate">
                <label for="">Ad , Soyad</label>
                <input type="text" class="form-control" value='{{ $message->name }}'>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group translate">
                <label for="">Nömrə</label>
                <input  class="form-control" value='{{ $message->phone }}'>
            </div>
            </div>
           </div>

           <div class="row mb-3">
            <div class="col-md-6">
            <div class="form-group translate">
                <label for="">Email</label>
                <input  class="form-control" value='{{ $message->email }}'>
            </div>
            </div>

             <div class="col-md-6">
            <div class="form-group translate">
                <label for="">Kurs</label>
                <input  class="form-control" value='{{ $course->translate('title') }}'>
            </div>
            </div>

           </div>

          

           <a href="{{ route('admin.register_message.index') }}" class="btn btn-success">Geri</a>

        </div>
        </div>
        </div>
        </div>
        </div>
</div>
</div>

@endsection

@push('js')
    <script src="{{ asset('manager/js/translate.js') }}"></script>
@endpush
