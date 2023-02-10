@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($course->translate('meta_desc'), 155, '...') }}@endsection

@section('title'){{ $course->translate('meta_title')}}@endsection

@section('meta_keywords'){{ $course->translate('meta_key')}}@endsection

@section('content')
<section id="page-head" class="course-single-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="home-slider-head">
                {{ $course->translate('title') }}
            </h2>
            <p class="home-slider-body">
                {{ $course->translate('sub_title') }}
                
            </p>
            <a href="#" class="home-slider-btn">
                Ətraflı
            </a>
            <div class="course-date">
                <p class="course__head vacancy_head">
                    Kurs cədvəli
                </p>
                <div class="course-types">
                    <p>
                        {{ $course->month }} ay
                    </p>
                    <span></span>
                    <p>
                        {{ $course->hours }} saat
                    </p>
                    <span></span>
                    <p>
                        @if ($course->type==1)
                           Əyani
                           @elseif($course->type==2)
                               Onlayn
                           @else
                           Əyani + Onlayn
                           @endif
                    </p>
                </div>
            </div>
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
                    <a href="{{route('course.'.app()->getLocale())}}">
                        Kurslar /
                    </a>
                </li>
                <li>
                    {{ $course->translate('title') }}
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--course single start-->
<section id="course-single">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <p class="course_head">
                    Kurs haqqında
                </p>
                <p class="course_body">
                    {{ $course->translate('desc') }}
                </p>
                <div data-aos="fade-up" class="programs">
                    @php
                    $image=\App\Models\Course::where('id',$course->id)->first();
                    $images=explode('|',$image->images);
                    @endphp
                    
                    @foreach ($images as $key=>$item)
                    @if($item)
                    <div>
                        <img src="{{ asset($item) }}" alt="">
                    </div>
                    @endif
                    @endforeach
                </div>
               @if($who_courses)
                <p data-aos="fade-up" class="course_head">
                    Bu kurs kimlər üçündür?
                </p>
                <div data-aos="fade-up" class="single-cards">
                @foreach($who_courses as $item)
                    <div class="single-card">
                        <img src="{{ asset($item->logo) }}" alt="">
                        <h4 class="single_head">
                            {{$item->translate('title')}}
                        </h4>
                    </div>
                @endforeach
                </div>
                @else

               @endif
                
                @if(@isset($salary))
                 <p data-aos="fade-up" class="course_head">
                    {{$salary->translate('title')}}
                </p>
                <div data-aos="fade-up" class="salary-cards">
                    <div class="salary-card">
                        <p class="salary-head">
                            Junior mütəxəssis
                        </p>
                        <p class="salary-number">
                           {{$salary->junior}} AZN
                        </p>
                        <p class="salary-text">
                           {{$salary->translate('junior_desc')}}
                        </p>
                    </div>
                    <div data-aos="fade-up" class="salary-card">
                        <p class="salary-head">
                            Middle mütəxəssis
                        </p>
                        <p class="salary-number">
                            {{$salary->middle}} AZN
                        </p>
                        <p class="salary-text">
{{$salary->translate('middle_desc')}}                        </p>
                    </div>
                    <div data-aos="fade-up" class="salary-card">
                        <p class="salary-head">
                            Senior mütəxəssis
                        </p>
                        <p class="salary-number">
                           {{$salary->senior}} AZN
                        </p>
                        <p class="salary-text">
                            {{$salary->translate('senior_desc')}}
                        </p>
                    </div>
                </div>
                @else

                @endif
                
                    @if($sillabus===0)
                    
                    @else
                    <p data-aos="fade-up" class="course_head">
                        Sillabus
                    </p>
                    <div data-aos="fade-up" class="sillabus-cards">
                        <div class="sillabus-card">
                            <p class="sillabus-head">
                                1-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_1') !!}
                            </ul>
                        </div>
                        <div class="sillabus-card">
                            <p class="sillabus-head">
                                2-ci ay
                            </h4>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_2') !!}

                            </ul>
                        </div>
                        <div class="sillabus-card">
                            <p class="sillabus-head">
                                3-cü ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_3') !!}
                            </ul>
                        </div>
                        <div class="sillabus-card">
                            <p class="sillabus-head">
                                4-cü ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_4') !!}
                            </ul>
                        </div>
                        <div class="sillabus-card">
                            <p class="sillabus-head">
                                5-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_5') !!}
                            </ul>
                        </div>
                        @if($sillabus->translate('month_6')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                6-cı ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_6') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_7')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                7-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_7') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_8')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                8-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_8') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_9')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                9-cu ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_9') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_10')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                10-cu ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_10') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_11')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                11-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_11') !!}
                            </ul>
                        </div>
                         @endif
                        @if($sillabus->translate('month_12')!="")
                        <div  class="sillabus-card">
                            <p class="sillabus-head">
                                12-ci ay
                            </p>
                            <ul class="sillabus-list">
                                {!! $sillabus->translate('month_12') !!}
                            </ul>
                        </div>
                         @endif
                                                
                    </div>
                    
                    
                    @endif
                <p data-aos="fade-up" @if($contact->teacher_aktiv==0) style="display:none" @endif class="course_head">
                    Bu sahə üzrə təlimçilərimiz
                </p>
                <div data-aos="fade-up" @if($contact->teacher_aktiv==0) style="display:none" @endif class="teacher-cards">
                    @foreach ($course->teachers as $item)
                    <div class="teacher-card">
                        <a href="#">
                            <div class="teacher-card-img">
                                <img src="{{ asset($item->img) }}" alt="">
                            </div>
                            <p class="teacher-name">
                                {{ $item->translate('name') }}
                            </p>
                            <p class="teacher-job">
                                {{ $item->translate('position') }}
                            </p>
                        </a>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
            <div data-aos="fade-up" class="col-5">
                <form method="POST" action="{{ route('register_post') }}" class="single-form">
                 @csrf
                    <p class="sticky-head">
                        Müraciət et
                    </p>
                    <span>
                        Kurs seçin
                    </span>
                    <select name="course_id" id="">
                        @foreach ($courses as $item)
                        <option @if($item->id==$course->id)
                            selected
                        @endif value="{{$item->id}}">
                                {{ $item->translate('title') }}
                        </option>
                        @endforeach

                    </select>
                    @error('kurs_id')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <span>
                        Ad,Soyad
                    </span>
                    <input type="text" class="text-input" name="name" placeholder="Ad Soyad">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                   
                    <span>
                        E-mail
                    </span>
                    <input type="email" name="email" placeholder="example@gmail.com">
                    @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <span>
                        Əlaqə nömrəsi
                    </span>
                    <input type="text" class="contact-number" name="phone" placeholder="+994 55 555 55 55">
                    @error('phone')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <button type="submit" >
                        Göndər
                        <img src="{{ asset('front/') }}/./img/right-2.svg" alt="">
                    </button>
                </form>
            </div>
            <div data-aos="fade-up" class="carier">
                <p class="course_head">
                    Karyera dəstəyi
                </p>
                <div class="carier-cards">
                @foreach($supports as $item)
                    <div class="carier-card">
                        <p class="single-head vacancy_head">
                            {{$item->translate('title')}}
                        </p>
                        <div class="carier-text">
                            {{$item->translate('desc')}}
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--course single end-->
<!--graduates start-->
<section data-aos="fade-up" data-aos="fade-up" id="graduates">
    <div class="container">
        <div class="row">
            <p class="head-text">
                Məzunlarımız
            </p>
            <p class="body-text">
                Məzunlarımızın “JED Academy” haqqında fikirləri ilə tanış olun
            </p>
            <div class="comment-slider owl-carousel owl-theme">
               @foreach ($alumnis as $item)
                    <div class="comment-card">
                    <a href="{{route('graduates.'.app()->getLocale())}}">
                        <p class="comment-icon">
                            <img src="{{ asset('front/') }}/./img/com-icon.png" alt="">
                        </p>
                        <div class="comment-text">
                            {!! $item->translate('desc') !!}
                        </div>
                        <div class="comment-main">
                            <img class="comment-img" src="{{ asset($item->img) }}" alt="">
                            <div class="comment-body">
                                <p class="comment-name">
                                    {{ $item->translate('name') }}
                                </p>
                                <p class="comment-job">
                                    {{ $item->translate('position') }}
                                </p>
                                <div class="social">
                                @if($item->fb)
                                <a href="{{ $item->fb }}" target="_blank">
                                    <img src="{{ asset('front/') }}/./img/face-icon.png" alt="">
                                </a>
                                @endif
                                @if($item->ln)
                                <a href="{{ $item->fb }}" target="_blank">
                                    <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                                </a>
                                @endif
                            </div>
                        </div>
                    </a>
                    </div>
            </div>
               @endforeach
            </div>
        </div>
    </div>
    </section>

     <section data-aos="fade-up" id="consultations">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="consul-head">
                        Pulsuz Konsultasiya
                    </p>
                    <p class="consul-body">
Tədris sahəsinin seçimi ilə bağlı çətinlik çəkirsinizsə, pulsuz konsultasiya xidmətimizdən istifadə edin. Biz sizə doğru seçim etməkdə yardımçı olacayıq
                    </p>
                </div>
                <div class="col-6">
                    <form method="POST" action="{{route('kon_post')}}">
                    @csrf
                        <input type="text" name="name" placeholder="Adınız Soyadınız">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                        <input type="text" name="number" placeholder="Əlaqə nömrəsi">
                    @error('number')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                        <button type="submit" class="consul-btn">
                            Mənə zəng edin
                            <img src="{{ asset('front/') }}/./img/Calling.png" alt="">
                        </button>
                        <div class="call-we">
                            <p>
                                Və ya siz bizə zəng edin!
                            </p>
                            <div class="call-we-numbers">
                                <img src="{{ asset('front/') }}/./img/cal.png" alt="">
                                <a href="tel:+994509836699">
                                    +994 50 983 66 99
                                </a>
                                <span>/</span>
                                <a href="tel:+994509836699">
                                    +994 50 983 66 99
                                </a>
                                <a href="+994123101599">
                                    <img src="{{ asset('front/') }}/./img/phone-1.png" alt="">
                                    +994 12 310 15 99
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--consultations end-->
    <!--abot drop start-->
    <section data-aos="fade-up" id="about-drop">
        <div class="container">
            <div class="row">
                <p class="head-text">
                    Tez-tez verilən suallar
                </p>
                <p class="body-text">
                    Bizə tez-tez verilən suallar və onların cavabları ilə aşağıda tanış ola bilərsiniz
                </p>
                <div class="about-drop">
                    @foreach($questions as $key=>$question)
                      <div class="about-drop-item">
                        <div class="about-drop-head">
                            <h3 class="about-drop-head-text">
                               {{$question->translate('title')}}
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
                           {{$question->translate('desc')}}
                        </div>
                        <p class="about-drop-line"></p>
                    </div>
                    @endforeach

                    @foreach($questions_esas as $item)
                    <div class="about-drop-item">
                        <div class="about-drop-head">
                            <h3 class="about-drop-head-text">
                                {{$item->translate('title')}}
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
                            {{$item->translate('desc')}}
                        </div>
                        <p class="about-drop-line"></p>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--about drop end-->
    <!--courses start-->
    <section data-aos="fade-up" id="courses">
        <div class="container">
            <div class="row">
                <p class="head-text">
                    Digər kurslarımız
                </p>
                <p class="body-text">
                    JED Academy-də siz proqramlaşdırma sahəsinin ən tələb edilən istiqamətləri üzrə təhsil ala bilərsiniz
                </p>
                <div class="course-slider owl-carousel owl-theme">
                    @foreach($courses1 as $item)
                    <div class="course-card">
                        <h4 class="course-head">
                           {{$item->translate('title')}}
                        </h4>
                        <p class="course-body">
                            {{$item->translate('short_desc')}}
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
    <!--ceo start-->
    <section data-aos="fade-up" id="ceo">
        <div class="container">
            <div class="row">
                <h2 class="ceo-head">
                    {{$course->translate('seo_title')}}
                </h2>
                <p class="ceo-text">
                    {{$course->translate('seo_desc')}}
                </p>
            </div>
        </div>
    </section>
</section>
@endsection