@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($vacancy_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($vacancy_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $vacancy_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/vakansiya.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Vakansiyalar
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
                        Vakansiyalar 
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--vacancy start-->
<section id="vacancy">
    <div class="container">
        <div class="row">
            <h4 class="vacancy-head">
                JedAcademy de hal hazırda bu vakansiyalar mövcutdur
            </h4>
            <p class="vacancy-text">
                Lorem ipsum dolor sit amet consectetur. Sit consequat lacus faucibus diam libero. Posuere tristique
                enim ultrices consectetur eget cras eget aliquam. Etiam nunc a vitae malesuada. Sed viverra velit
                nunc nibh. Etiam lacinia lacus amet turpis etiam elit.
            </p>
            <div class="vacancy-cards">
                @foreach ($vacancies as $item)
                <div class="vacancy-card">
                <a href="{{ route('vacancy_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                    <div class="card-head">
                        <img src="{{ asset($item->logo) }}" alt="">
                        <h4 class="card-head-text">
                            {{ $item->translate('name') }}
                        </h4>
                    </div>
                    <p class="card-body-text">
                        {{ $item->translate('desc') }}
                    </p>
                    <a href="{{ route('vacancy_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}" class="vacancy-btn">
                        Ətraflı
                        <img src="{{ asset('front/') }}/./img/Right.svg" alt="">
                    </a>
                    </a>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
</section>
<!--vacancy end-->
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