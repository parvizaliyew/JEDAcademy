@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($ser_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($ser_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $ser_seo->translate('title') }}@endsection 

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Sertifikatlar
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
                    <a href="">
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
<!--certificate start-->
<section id="certificate">
    <div class="container">
        <div class="row">
            <p class="body-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, aliquam. Suscipit hic doloribus
                numquam quo tempora, repudiandae voluptas a ad quos architecto illum voluptate quas beatae? Nesciunt
                dicta asperiores recusandae.
            </p>
            <form action="{{ route('search') }}" method="GET" class="certificate-search">
                <input type="text" name="number" placeholder="Sertifikat nömrənizi daxil edin.">
                 <button type="submit">
                         <img src="{{ asset('front/') }}/./img/cer-search.png" alt="">
                    </button>
            </form>
            <div class="certificate-img">
                <img src="{{ asset('front/') }}/./img/certifacate.png" alt="">
            </div>
        </div>
    </div>
</section>


@endsection