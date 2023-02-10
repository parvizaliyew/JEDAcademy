@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($graduates_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($graduates_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $graduates_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Məzunlar
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
                    <a>
                        Akademiya /
                    </a>
                </li>
                <li>
                    Məzunlar
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--graduates start-->
<section data-aos="fade-up" id="graduates">
    <div class="container">
        <div class="row">
            <div class="graduate-cards">
                @foreach ($alumnis as $item)
                <div class="graduate-card">
                    <img src="{{ asset($item->img) }}" alt="">
                    <div class="graduate-body">
                        <div class="graduate-head-block">
                            <h3 class="graduate-head">
                                {{ $item->translate('name') }}
                            </h3>
                            <div class="social">
                               @if ($item->fb)
                               <a href="{{ $item->fb }}" target="_blank">
                                <img src="{{ asset('front') }}/./img/face-icon.png" alt="">
                               </a> 
                               @endif
                               
                               @if($item->ln)
                               <a href="{{ $item->ln }}" target="_blank">
                                <img src="{{ asset('front') }}/./img/linkedin-icon.png" alt="">
                               </a>
                               @endif
                            </div>
                        </div>
                        <p class="graduate-job">
                            {{ $item->translate('position') }}
                        </p>
                        <div class="graduate-text">
                            {!! $item->translate('desc') !!}
                        </div>
                    </div>
                </div>
                @endforeach
                
              
            </div>
        </div>
    </div>
</section>
<!--graduates end-->
<!--abot drop start-->
<section data-aos="fade-up" id="about-drop">
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
                  <div class="about-drop-item @if($key==0) active @endif ">
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