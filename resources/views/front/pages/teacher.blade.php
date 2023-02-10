@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($teacher_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($teacher_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $teacher_seo->translate('title')}}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Təlimçilər
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
                    Təlimçilərimiz
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--teacher cards start-->
<section id="teacher-cards">
    <div class="container">
        <div class="row">
            <div class="teacher-cards">

               @foreach ($teachers as $item)
               <div class="teacher-card">
                <a href="{{ route('teacher_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                    <div class="teacher-card-img">
                        <img src="{{ asset($item->img) }}" alt="">
                    </div>
                    <h2 class="teacher-name">
                        {{ $item->translate('name') }}
                    </h2>
                    <p class="teacher-job">
                        {{ $item->translate('position') }}
                    </p>
                </a>
            </div>
               @endforeach

            </div>
        </div>
    </div>
</section>
<!--teacher cards end-->
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
            <div class="about-drop-item ">
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
                            </span><span style="display: none;">-</span>
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