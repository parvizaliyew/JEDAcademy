@extends('admin.layouts.master')

@section('title')
    Profil Update
@endsection
@section('content')
<div class="main_content_iner ">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
        <div class="box_header m-0">
        <div class="main-title">
        <h3 class="m-0">Profili Yenilə</h3>
        </div>
        </div>
        </div>
        <div class="white_card_body">
        <div class="card-body">
        <form method="POST" action="{{ route('admin.profilupdate_post') }}">
        @csrf
        <div class="row mb-3">
        <div class="col-md-6">
        <label class="form-label" for="name">Adınız</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" placeholder="Adınız">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputEmail4">Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>

        <div class="row mb-3">
        
        <div class="col-md-6">
            <label class="form-label" for="newpassword">Yeni Şifrə</label>
            <input type="password" name="reset_password" class="form-control" id="newpassword" placeholder="Yeni Şifrə-nizi daxil edin">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="newpassword1">Şifrəni Təkrarla</label>
            <input type="password" name="confirm_password" class="form-control" id="newpassword1" placeholder="Şifrəni Təkrarla">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Yenilə</button>
        </form>
        </div>
        </div>
        </div>
        </div>
</div>
    
@endsection