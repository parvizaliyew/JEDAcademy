@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($vacancy->translate('desc'), 155, '...') }}@endsection

@section('title'){{ $vacancy->translate('name')}}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/vakansiya.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                {{ $vacancy->translate('name')}} 
            </h2>
        </div>
    </div>
    <div class="page-bg"></div>
</section>
<!--page head end-->
<!--breadcrumb start-->
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <a href="{{route('index.'.app()->getLocale())}}">
                        Ana səhifə /
                    </a>
                </li>
                <li>
                    <a href="{{route('vacancy.'.app()->getLocale())}}">
                        Vakansiyalar /
                    </a>
                </li>
                <li>
                    {{ $vacancy->translate('name')}}
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--vacncy single start-->
<section id="vacancy-single">
    <div class="container">
        <div class="row">
            <div class="vacancy-single">
                <h3 class="vacancy_head">
                    İş barədə məlumat
                </h3>
                <ul class="vacancy-list">
                    {!! $vacancy->translate('job_info') !!}
                </ul>
            </div>
            <div class="vacancy-single">
                <h3 class="vacancy_head">
                    Namizəd üçün tələblər
                </h3>
                <ul class="vacancy-list">
                    {!! $vacancy->translate('nam_req') !!}
                </ul>
            </div>
            <div class="vacancy-single">
                <h3 class="vacancy_head">
                    Müraciət üçün
                </h3>
                <ul class="vacancy-list">
                    {!! $vacancy->translate('request') !!}
                </ul>
            </div>
        </div>
    </div>
</section>
<!--subscription start-->
<section id="subscription">
    <div class="container">
        <div class="row">
            <span class="sub-line"></span>
            <h4 class="sub-text">
                Kampaniyalar və endirimlər barədə xəbərdar olmaq üçün, email büllitenimizə abunə olun 
            </h4>
            <form method="POST" action="{{route('subscripe_post')}}">
            @csrf
                <input type="email" name="email" placeholder="example@gmail.com">
                <button type="submit">
                    Göndər
                    <img src="{{ asset('front/') }}/./img/Mail.png" alt="">
                </button>
            </form>
            <img src="{{ asset('front/') }}/./img/mail-texture.png" alt="" class="mail-texture-1">
            <img src="{{ asset('front/') }}/./img/mail-texture.png" alt="" class="mail-texture-2">
        </div>
    </div>
</section>
@endsection