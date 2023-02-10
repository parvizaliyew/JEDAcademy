@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($discount->translate('desc'), 155, '...') }}@endsection

@section('title'){{ $discount->translate('title')}}@endsection

@section('content')
<section id="page-head">
    <img src="./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                ENDİRİMLƏR
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
<!--discount single start-->
<section id="discount-single">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h3 class="discount_head">
                    {{ $discount->translate('title') }}
                </h3>
                {!! $discount->translate('desc') !!}
                <p class="discount_date">
                    Kampaniyanın bitmə tarixi: <span>{{ Carbon\Carbon::parse($discount->date)->format('d.m.Y') }}</span>
                </p>
                <a href="{{route('register.'.app()->getLocale())}}" class="discount_btn">
                    Müraciət et
                </a>
            </div>
            <div class="col-5">
                <img src="{{ asset($discount->img) }}" alt="">
            </div>
        </div>
    </div>
</section>
<section id="discount-single" class="mobile-discount">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h3 class="discount_head">
                    {{ $discount->translate('title') }}
                </h3>
                <div class="col-5">
                    <img src="{{ asset($discount->img) }}" alt="">
                </div>
                {!! $discount->translate('desc') !!}
                <p class="discount_date">
                    Kampaniyanın bitmə tarixi: <span>{{ Carbon\Carbon::parse($discount->date)->format('d.m.Y') }}</span>
                </p>
                <a href="{{route('register.'.app()->getLocale())}}" class="discount_btn">
                    Müraciət et
                </a>
            </div>
        </div>
    </div>
</section>
@endsection