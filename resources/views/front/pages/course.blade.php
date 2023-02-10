@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($courses_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($courses_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $courses_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Tədris sahələri
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
                    <a href="#">
                        Ana səhifə /
                    </a>
                </li>
                <li>
                    <a href="#">
                        Akademiya /
                    </a>
                </li>
                <li>
                    Müəllimlərimiz
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--course cards start-->
<section data-aos="fade-up" id="course-cards">
    <div class="container">
        <div class="row">
            <div class="course-cards">
                @foreach ($courses as $item)
                <div class="course-card">
                    <h4 class="course-head">
                        {{ $item->translate('title') }}
                    </h4>
                    <p class="course-body">
                        {{ $item->translate('short_desc') }}
                    </p>
                    <div class="course-bottom">
                        <p class="course-time">
                            <img src="{{ asset('front/') }}/./img/time.png" alt="">
                            {{ $item->month }} ay / {{ $item->hours }} saat
                        </p>
                        <p class="course-type">
                            <img src="{{ asset('front/') }}/./img/type.png" alt="">
                           @if ($item->type==1)
                           Əyani
                           @elseif($item->type==2)
                               Onlayn
                           @else
                           Əyani + Onlayn
                           @endif 
                        </p>
                    </div>
                    <span class="course-line"></span>
                    <div class="course-buttons">
                        <a href="{{ route('course_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                            Ətraflı
                        </a>
                        <a href="{{route('register_id.'.app()->getLocale(),$item->id)}}">
                            Qeydiyyat
                        </a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
<!--course cards end-->
<!--subscription start-->
<section id="subscription">
    <div class="container">
        <div class="row">
            <span class="sub-line"></span>
            <h4 class="sub-text">
                Kampaniyalar və endirimlər barədə xəbərdar olmaq üçün, email büllitenimizə abunə olun 
            </h4>
            <form  method="POST" action="{{route('subscripe_post')}}">
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
<!--subscription end-->
<!--abot drop start-->
<section id="about-drop">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Tez-tez verilən suallar
            </h2>
            <p class="body-text">
                Bizə tez-tez verilən suallar və onların cavabları ilə aşağıda tanış ola bilərsiniz
            </p>
            <div class="about-drop">
            @foreach($questions as $key=>$val)
  <div class="about-drop-item @if($key==0) active @endif">
                    <div class="about-drop-head">
                        <h3 class="about-drop-head-text">
                            {{$val->translate('title')}}
                        </h3>
                        <div class="about-drop-icon">
                            <span>
                                <img src="{{ asset('front/') }}/./img/drop-img.svg" alt="">
                            </span>
                            <span style="display:none;">
                                <img src="{{ asset('front/') }}/./img/drop-img.svg" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="about-drop-body">
                        {{$val->translate('desc')}}
                    </div>
                    <p class="about-drop-line"></p>
                </div>
            @endforeach
                
               
            </div>
        </div>
    </div>
</section>
@endsection