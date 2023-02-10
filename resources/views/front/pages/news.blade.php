@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($news_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($news_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $news_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Bloq və Media
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
                    Bloq
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--media cards start-->
<section data-aos="fade-up" id="media-cards">
    <div class="container">
        <div class="row">
            <div class="media-cards">
                @foreach ($blogs as $item)
                <div class="media-card">
                    <a href="{{ route('blog_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                        <div class="media-img">
                            <img src="{{ asset($item->img) }}" alt="">
                        </div>
                        <h4 class="media-head">
                            {{ $item->translate('title') }}
                        </h4>
                        <p class="media-body">
                            {{ $item->translate('short_desc') }}
                        </p>
                        <div class="media-bottom">
                            <span class="time">
                                <img src="{{ asset('front') }}/./img/date.png" alt="">
                                {{ Carbon\Carbon::parse($item->date)->format('d.m.Y') }}
                            </span>
                            <img src="{{ asset('front') }}/./img/media-right.png" alt="">
                        </div>
                    </a>
                </div>
                @endforeach
               
                
            </div>
        </div>
    </div>
</section>
<!--media cards end-->
<!--subscription start-->
<section data-aos="fade-up" id="subscription">
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
                    <img src="{{ asset('front') }}/./img/Mail.png" alt="">
                </button>
            </form>
            <img src="{{ asset('front') }}/./img/mail-texture.png" alt="" class="mail-texture-1">
            <img src="{{ asset('front') }}/./img/mail-texture.png" alt="" class="mail-texture-2">
        </div>
    </div>
</section>
@endsection