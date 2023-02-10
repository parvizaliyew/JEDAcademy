@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($index_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($index_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $index_seo->translate('title') }}@endsection

@section('content')
<section data-aos="fade-up" id="home">
    <div class="home-slider owl-carousel owl-theme">
        @foreach ($sliders as $item)
        <div class="item">
            <img src="{{ asset($item->img) }}" alt="">
            <div class="home-bg"></div>
            <div class="slider-line"></div>
            <div class="container">
                <div class="row">
                    <h2 class="home-slider-head">
                        {{ $item->translate('title') }}
                    </h2>
                    <p class="home-slider-body">
                       {{ $item->translate('desc') }}
                    </p>
                    <a href="{{ $item->link }}" class="home-slider-btn">
                        Ətraflı
                    </a>
                </div>
            </div>
        </div>
        @endforeach
       
     
        <!-- <div class="owl-dots">
            <button class="owl-dot">
                <span></span>
            </button>
        </div> -->
    </div>
</section>
<!--home end-->
<!--about start-->
<section data-aos="fade-up" id="about">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Haqqımızda
            </h2>
            <p class="body-text">
                Proqramlaşdırma sahəsində yüksək səviyyəli təhsil almaq istəyirsinizsə doğru ünvandasınız. JED Academy – Real Bilik, Real Təcrübə!
            </p>
            <div class="about">
                <div class="col-4">
                    <img src="{{ asset('front/') }}/./img/about-img-1.png" alt="">
                </div>
                <div class="col-4">
                    <h3 class="about-head">
                        JED Academy Proqramlaşdırma və IT kursları
                    </h3>
                    <p class="about-body">
                        JED Academy heyəti təcrübəli IT mütəxəssilərdən və proqramçılardan ibarətdir. Bu mütəxəssislər bir araya gələrək yüksək keyfiyyətli tədris mərkəzi yaratmaq qərarına gəlmişdilər və beləliklə JED Academy yarandı.
                        Yarandığımız gündən bu günə qədər yüzlərlə məzun kurslarımızı uğurla bitirib və hal-hazırda yüksək səviyyəli mütəxəssis olaraq çalışırlar. Biz hər tələbəyə xüsusi diqqət və qayğı ilə yanaşırıq ki, buda bizi digər tədris mərkəzlərindən fərqləndirən ən önəmli amillərdən biridir
                    </p>
                    <a class="about-btn" href="http://academy.testjed.me/haqqimizda">
                        Ətraflı
                        <img src="{{ asset('front/') }}/./img/about-right.png" alt="">
                    </a>
                </div>
                <div class="col-4 little-img">
                    <img src="{{ asset('front/') }}/./img/about-img-2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--about end-->
<!--courses start-->
<section data-aos="fade-up" id="courses">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Tədris Sahələri
            </h2>
            <p class="body-text">
                JED Academy-də siz proqramlaşdırma sahəsinin ən tələb edilən istiqamətləri üzrə təhsil ala bilərsiniz
            </p>
            <div class="course-slider owl-carousel owl-theme">
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
<!--courses end-->
<!--why we start-->
<section data-aos="fade-up" id="why-we">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Niyə JED Academy?
            </h2>
            <p class="body-text">
                Bizi digər təhsil mərkəzlərindən fərqli edən üstünküllər ilə aşağıda tanış olun və doğru seçim edin
            </p>
            <div class="why-cards">
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/1..png" alt="">
                    <h4 class="why-head">
                        Kiçik Qruplar
                    </h4>
                    <p class="why-body">
                        Dərslər kiçik qruplarda keçirilir, qrupda 4-7 tələbə olur
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/2..png" alt="">
                    <h4 class="why-head">
                        Təcrübəli Təlimçilər
                    </h4>
                    <p class="why-body">
                        Çox peşəkar və təcrübəli təlimçilərdən dərin bilikləri və geniş təcrübəni əldə etmiş olacaqsınız
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/3..png" alt="">
                    <h4 class="why-head">
                        Nəzəriyyə + Praktika
                    </h4>
                    <p class="why-body">
                        Hər gün tədris + hər gün praktiki məşğələ metodu ilə seçdiyiniz sahəsi sürətlə öynəcəksiniz
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/4..png" alt="">
                    <h4 class="why-head">
                        Təcrübə proqramı və Karyera dəstəyi
                    </h4>
                    <p class="why-body">
                        Kursu bitirdikdən sonra tələbələrimizi təcrübə proqramı ilə təmin edirik və iş həyatına tez başlamaları üçün  əməkdaşlıq etdiyimiz şirkətlərə yönəldirik
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/5..png" alt="">
                    <h4 class="why-head">
                        Ödənişsiz Sınaq Dərsləri
                    </h4>
                    <p class="why-body">
                        Sınaq dərslərimizdə heç bir ödəniş etmədən iştirak edib, tədrisimizin keyfiyyətini dəyərləndirə bilərsiniz
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/card-6.png" alt="">
                    <h4 class="why-head">
                        Əyani və Online dərslər
                    </h4>
                    <p class="why-body">
                        Dərimizdə istər əyani, həm online formatda iştirak edə bilərsiniz
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/7..png" alt="">
                    <h4 class="why-head">
                        Dərslərin Video Yazıları
                    </h4>
                    <p class="why-body">
                        Hər dərsdən sonra həmin dərsin video yazılarını əldə edəcəksiniz və istədiyiniz zaman həmin yazılara təkrar baxaraq, unutduğunuz mövzuları təkrarlaya biləcəksiniz
                    </p>
                </div>
                <div class="why-card">
                    <img src="{{ asset('front/') }}/./img/8..png" alt="">
                    <h4 class="why-head">
                        Zəmanət Veririk
                    </h4>
                    <p class="why-body">
                        Tədrisimizə tam zəmanət veririk: əgər hər hansı mövzu və ya mövzular sizə tam aydın olmasa, həmin dərsləri sizə təkrar keçəcəyik
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--why we end-->
<!--carier start-->
<section data-aos="fade-up" id="carier" class="carier">
    <div class="container">
        <div class="row">
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
</section>
<!--carier end-->
<!--consultations start-->
<section data-aos="fade-up" id="consultations">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="consul-head">
                    Pulsuz Konsultasiya
                </h3>
                <p class="consul-body">
                    Tədris sahəsinin seçimi ilə bağlı çətinlik çəkirsinizsə, pulsuz konsultasiya xidmətimizdən istifadə edin. Biz sizə doğru seçim etməkdə yardımçı olacayıq
                </p>
            </div>
            <div class="col-6">
                <form method="POST" action="{{route('kon_post')}}">
                    @csrf
                    <input name="name"  class="text-input" type="text" placeholder="Adınız Soyadınız">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <input type="text" name="number" class="contact-number" placeholder="Əlaqə nömrəsi">
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
<!--graduates start-->
<section data-aos="fade-up" id="graduates">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Məzunlarımız
            </h2>
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
                            <h3 class="comment-name">
                                {{ $item->translate('name') }}
                            </h3>
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
                                <a href="{{ $item->ln }}" target="_blank">
                                    <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--graduates end-->
<!--teachers strat-->
<section @if($contact->teacher_aktiv==0) style="display:none" @endif  data-aos="fade-up" id="teachers">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Təlimçilərimiz
            </h2>
            <p class="body-text">
                Təlimçilərimiz yüksək peşəkarlığa və böyük təcrübəyə malik mütəxəssislərdir. Biz yalnız böyük və texnoloji şirkətlərdə çalışan mütəxəssisləri bizimlə əməkdaşlıq etməyə dəvət edirik
            </p>
            <div class="course-slider owl-carousel owl-theme">
                @foreach($teachers as $key => $item)
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
<!--teachers end-->
<!--gallery start-->
<section data-aos="fade-up" id="gallery">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                JED Academydən görüntülər
            </h2>
            <p class="body-text gallery-textbox">
                “JED Academy”-də proqramlaşdırma və IT dərslərindən görüntülər. Əgər siz də peşəkar proqramçı və ya IT mütəxəssisi olmaq istəyirsinizsə <p class="rotate"> <span>-</span><span>></span></p><a class="register-gallery apply-btn" href="http://academy.testjed.me/qeydiyyatdan-kecin"> Qeydiyyatdan keçin</a> 
            </p>
            <div class="gallery-blocks">
                <div class="gallery-block">
                    @foreach ($galeries as $key=>$item)
                @if($key==0)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" />
                </a>
                @endif
                @endforeach
            </div>         
            <div class="gallery-block">
                @foreach ($galeries as $key=>$item)
                @if($key==1)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" alt="">
                </a>
                @endif
                @if($key==2)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" alt="">
                </a>               
                @endif                   
                @endforeach
            </div>
            <div class="gallery-block">
                @foreach ($galeries as $key=>$item)
                @if($key==3)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" alt="">
                </a>
                @endif
                @if($key==4)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" alt="">
                </a>
                @endif
                @endforeach
            </div>
            <div class="gallery-block">
                @foreach ($galeries as $key=>$item)
                @if($key==5 ||$key==6 || $key==7)
                <a href="{{ asset($item->img) }}" data-fancybox="group">
                    <img src="{{ asset($item->img) }}" alt="">
                </a>
                @endif
                @endforeach
            </div>
        </div>
        </div>
    </div>
</section>
<!--gallery end-->
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
<!--payment start-->
<section data-aos="fade-up" id="payment">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Ödəmə üsuluları
            </h2>
            <p class="body-text">
                Təhsil haqqını rahatlıqla ödəmək üçün müxtəlif ödəniş üsullarından istifadə edə bilərsiniz
            </p>
            <div class="payment-cards">
                <div class="payment-card">
                    <div class="payment-imgs">
                        <img src="{{ asset('front/') }}/./img/million.png" alt="">
                        <img src="{{ asset('front/') }}/./img/emanat.png" alt="">
                    </div>
                    <p class="payment-text">
                        MilliÖn və E-Manat ödəmə terinalları vasitəsilə
                    </p>
                </div>
                <div class="payment-card">
                    <div class="payment-imgs">
                        <img src="{{ asset('front/') }}/./img/1.png" alt="">
                        <img src="{{ asset('front/') }}/./img/2.png" alt="">
                        <img src="{{ asset('front/') }}/./img/3.png" alt="">
                        <img src="{{ asset('front/') }}/./img/odeme2.png" alt="">
                        <img src="{{ asset('front/') }}/./img/odeme1.png" alt="">
                    </div>
                    <p class="payment-text">
                        Ödəniş etmə tətbiqləri ilə ödəniş edə bilərsiniz
                    </p>
                </div>
                <div class="payment-card">
                    <div class="payment-imgs">
                        <img src="{{ asset('front/') }}/./img/mastercard.png" alt="">
                        <img src="{{ asset('front/') }}/./img/visa.png" alt="">
                    </div>
                    <p class="payment-text">
                        Visa və Mastercard vasitəsilə
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--payment end-->
<!--media start-->
<section data-aos="fade-up" id="media">
    <div class="container">
        <div class="row">
            <h2 class="head-text">
                Bloq və Media
            </h2>
            <p class="body-text">
                Texnologiya, IT və Proqramaşdırma sahələrində yeniliklər ilə marağlanırsınızsa, Bloqumuzu izləyin
            </p>
            <div class="media-slider owl-carousel owl-theme">
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
                            {{ Carbon\Carbon::parse($item->date)->format('d.m.Y') }}
                        </span>
                        <img src="{{ asset('front/') }}/./img/media-right.png" alt="">
                    </div>
                </a>
            </div>
              @endforeach
            </div>
        </div>
    </div>
</section>
<!--media end-->
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
                @error('email')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                @enderror
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