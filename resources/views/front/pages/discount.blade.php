@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($discount_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($discount_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $discount_seo->translate('title') }}@endsection

@section('content')
<!--page head start-->
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Endirimlər
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
                    Endirimlər
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--discount start-->
<section id="discount">
    <div class="container">
        <div class="row">
            <div class="discount-cards">
                @foreach ($discounts as $item)
                <a href="{{ route('discount_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                    <div class="discount-card">
                    <img class="discount-img" src="{{ asset($item->img) }}" alt="">
                    <div class="discount-body">
                        <h3 class="discount-head">
                            {{ $item->translate('title') }}
                        </h3>
                        <p class="discount-text">
                            Kampaniyanın bitmə tarixi: <span class="discount-date">{{ Carbon\Carbon::parse($item->date)->format('d.m.Y') }}</span>
                        </p>
                        <a href="{{ route('discount_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}" class="discount-btn">
                            Ətraflı
                            <img src="{{ asset('front/') }}/./img/right-2.svg" alt="">
                        </a>
                    </div>
                </a>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
</section>
@endsection