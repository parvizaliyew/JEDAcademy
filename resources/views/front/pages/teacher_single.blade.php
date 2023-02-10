@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($teacher->translate('desc'), 155, '...') }}@endsection

@section('title'){{ $teacher->translate('name')}}@endsection

@section('content')
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
                    Təlimçilər
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--teacher single start-->
<section data-aos="fade-up" id="teacher-single">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset($teacher->img) }}" alt="">
            </div>
            <div class="col-5">
                <h3 class="teacher_name">
                    {{ $teacher->translate('name') }}
                </h3>
                <p class="teacher_job">
                    {{ $teacher->translate('position') }}
                </p>
                <p class="teacher_company">
                    {{ $teacher->translate('company_name') }}
                </p>
                <p class="teacher_info">
                   {{ $teacher->translate('desc') }}
                </p>
            </div>
        </div>
    </div>
</section>
<!--teacher single end-->
<!--courses start-->
<section data-aos="fade-up" id="courses">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Tədris etdiyi proqramlar
            </h2>
            <div class="course-slider owl-carousel owl-theme">
               @foreach($teacher->courses as $item)
                <div class="course-card">
                    <h4 class="course-head">
                        {{$item->translate('title')}}
                    </h4>
                    <p class="course-body">
                        {{{$item->translate('short_desc')}}}
                    </p>
                    <div class="course-bottom">
                        <p class="course-time">
                            <img src="{{ asset('front/') }}/./img/time.png" alt="">
                            {{$item->month}} ay / {{$item->hours}} saat
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
                        <a href="{{route('course_single.'.app()->getLocale(),$item->slug[app()->getLocale()])}}">
                            Ətraflı
                        </a>
                        <a href="{{route('register_id.'.app()->getLocale(),$item->id)}}">
                            Müraciət et
                        </a>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</section>
<!--courses end-->
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
<!--about drop end-->
<!--subscription start-->
<section data-aos="fade-up" id="subscription">
    <div class="container">
        <div class="row">
            <span class="sub-line"></span>
            <h4 class="sub-text">
                Kampaniyalar və endirimlər barədə xəbərdar olmaq üçün, email büllitenimizə abunə olun 
            </h4>
            <form action="#">
                <input type="email" placeholder="example@gmail.com">
                <button>
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