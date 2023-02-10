@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($about_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($about_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $about_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Haqqımızda
            </h2>
        </div>
    </div>
    <div class="page-bg"></div>
</section>
<!--page head end-->
<!--about start-->
<section id="about">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" class="about-block">
                <div class="col-5">
                    <div class="bg-block-1"></div>
                    <div class="bg-block-2"></div>
                    <div class="bg-block-3"></div>
                    <img src="{{ asset('front') }}/./img/01.webp" alt="">
                </div>
                <div class="col-6">
                    <h3 class="about_head vacancy_head">
                        JED Academy Proqramlaşdırma və IT kursları
                    </h3>
                    <p class="about_text">
                        JED Academy heyəti təcrübəli IT mütəxəssilərdən və proqramçılardan ibarətdir. Bu mütəxəssislər bir araya gələrək yüksək keyfiyyətli tədris mərkəzi yaratmaq qərarına gəlmişdilər və beləliklə JED Academy yarandı.
                    </p>
                    <p class="about_text">
                        Yarandığımız gündən bu günə qədər yüzlərlə məzun kurslarımızı uğurla bitirib və hal-hazırda yüksək səviyyəli mütəxəssis olaraq çalışırlar. Biz hər tələbəyə xüsusi diqqət və qayğı ilə yanaşırıq ki, buda bizi digər tədris mərkəzlərindən fərqləndirən ən önəmli amillərdən biridir.
                    </p>
                    <p class="about_text">
                        Dərsləri ən effektiv və uğurlu metodika ilə keçirik. Keçdiyimiz hər dərs nəzəri və praktiki hissədən ibarətdir ki, bunun hesabına tələbələrimiz çox sürətli və keyfiyyətli öyrənirlər. Biz tədrisimizə tam zəmanət veririk: əgər hər hansı mövzular tələbəyə tam aydın olmasa biz həmin mövzuları tələbəyə təkrar keçirik.
                    </p>
                    <p class="about_text">
                        Təhsilin keyfiyyəti bizim üçün çox önəmlidir. Siz də yüksək səviyyəli IT mütəxəssis olmaq istəyirsinizsə JED Academy-ə gəlin, yeni bilik, bacarıq və təcrübəyə sahib olun. JED Academy - Real Bilik, Real Təcrübə!
                    </p>
                </div>
            </div>
            <div data-aos="fade-up" class="about-block">
                <div class="col-6">
                    <h3 class="about_head vacancy_head">
                        Missiyamız
                    </h3>
                    <p class="about_text">
                        Məqsədimiz - ölkəmizdə IT sahəsini inkişaf etdirmək, gənclərə IT sahəsinə giriş etmək üçün yardımçı olmaq və bu sahədə tədrisin keyfiyyətini artırmaqdır. Tədrisi uğurla bitirən məzunlarımıza karyera qurmaq üçün hərtərəfli dəstək göstəririk. Hər bir məzunumuzun uğuru bizim də uğurumuzdur!
                    </p>
                    <p class="about_text">
                        Missiyamızı yerinə yetirmək üçün biz davamlı olaraq tədris metodikamızı və proqramlarımızı gücləndiririk. IT və proqramlaşdırma sahəsində bütün yenilikləri, trendləri izləyirik və onları tədris proqramlarımıza əlavə edirik.
                    </p>
                    <p class="about_text">
                        Tələbələrimizin və məzunlarımızın 94% JED Academy-də aldıqları tədrisin keyfiyyətindən razıdırlar. Hər ikinci tələbəmiz bizi öz dostuna məsləhət görmək üçün hazırdır. Biz bu məlumatı hər ay keçirdiyimiz sorğuların nəticəsi olaraq əldə edirik.
                    </p>
                </div>
                <div class="col-5">
                    <img src="{{ asset('front') }}/./img/02.webp" alt="">
                </div>
            </div>
            <div data-aos="fade-up" class="about-block">
                <div class="col-5">
                    <div class="bg-block-1"></div>
                    <div class="bg-block-2"></div>
                    <div class="bg-block-3"></div>
                    <img src="{{ asset('front') }}/./img/03.webp" alt="">
                </div>
                <div class="col-6">
                    <h3 class="about_head vacancy_head">
                        Vizyonumuz
                    </h3>
                    <p class="about_text">
                        Gənclərimizin IT və proqramlaşdırma sahəsində potensialları çox yüksəkdir. Biz bu potensialı ortaya çıxarmaq və inkişaf etdirmək üçün onlara yardımçı oluruq. IT sahəsinə "sıfırdan" giriş edib, ilk iş yerini tapanadək biz öz tələbələrimizin yanında oluruq. Bu çətin yolda biz onlara daim dəstək oluruq: lazımi bilikləri veririk, təcrübəmizi paylaşırıq, doğru istiqaməti göstəririk və karyera qurmaq üçün dəstək oluruq.  
                    </p>
                    <p class="about_text">
                        Yarandığımız gündən bugünədək ölkəmizin ən yaxşı IT və proqramlaşdırma akademiyası olma yolunda tələbələrimizi keyfiyyətli və sürətli öyrənmə metodu ilə təmin etməyi əsas hədəf kimi öz üzərimizə götürmüşük və günü gündən bu məqsədimizə yaxınlaşırıq.    
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about end-->
<!--gallery start-->
<section id="gallery">
    <div data-aos="fade-up" class="container">
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
                <div data-aos="fade-up" class="gallery-block">
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
@endsection