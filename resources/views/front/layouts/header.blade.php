<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="@yield('meta_description')">
    <link rel="shortcut icon" href="{{ asset('front/') }}/./img/jed-favicon3.png" type="image/x-icon">
    <meta name="keyword" content="@yield('meta_keywords')">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/') }}/./css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/./css/reset.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/./css/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/./css/style.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
        integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>@yield('title','JEDAcademy')</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="logo">
                    <a href="{{route('index.'.app()->getLocale()) }}">
                        <img src="{{ asset('front/') }}/./img/jedlogo.svg" alt="">
                    </a>
                </div>
                <ul class="navbar">
                    <li>
                        <div class="logo mobile-logo">
                            <a href="{{route('index.'.app()->getLocale()) }}">
                                <img src="{{ asset('front/') }}/./img/jedlogo.svg" alt="">
                            </a>
                        </div>
                    </li>
                    <li class="@if(Route::is('about.'.app()->getLocale()) || Route::is('graduates.'.app()->getLocale()) || Route::is('teacher.'.app()->getLocale())|| Route::is('register.'.app()->getLocale()) || Route::is('sertifikat.'.app()->getLocale())  )   active @endif"
                     >
                        <a  href="javascript:void(0)">
                            Akademiya
                            <img src="{{ asset('front/') }}/./img/drop-arrow.svg" alt="">
                        </a>
                        <ul class="dropdown">
                            <li >
                                <a href="{{ route('about.'.app()->getLocale()) }}">
                                    Haqqımızda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('graduates.'.app()->getLocale()) }}">
                                    Məzunlar
                                </a>
                            </li>
                           
                            <li @if($contact->teacher_aktiv==0) style="display:none" @endif>
                                <a  href="{{ route('teacher.'.app()->getLocale()) }}">
                                    Təlimçilər
                                </a>
                            </li>

                             <li >
                                <a href="{{ route('sertifikat.'.app()->getLocale()) }}">
                                   Sertifikat Yoxla
                                </a>
                            </li>

                              <li >
                                <a href="{{ route('register.'.app()->getLocale()) }}">
                                   Qeydiyyatdan keç
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="@if(Route::is('course.'.app()->getLocale()) || Route::is('course_single.'.app()->getLocale())) active @endif" >
                        <a href="{{ route('course.'.app()->getLocale()) }}">
                            Tədris sahələri
                        </a>
                    </li>
                    <li class="@if(Route::is('blog.'.app()->getLocale()) || Route::is('blog_single.'.app()->getLocale()) )   active @endif">
                        <a href="{{ route('blog.'.app()->getLocale()) }}">
                            Blog
                        </a>
                    </li>
                    <li class="@if(Route::is('discount.'.app()->getLocale()) || Route::is('discount_single.'.app()->getLocale()) ) active @endif">
                        <a href="{{ route('discount.'.app()->getLocale()) }}">
                            Endirimlər
                        </a>
                    </li>
                    <li class="@if(Route::is('vacancy.'.app()->getLocale())) active @endif">
                        <a href="{{ route('vacancy.'.app()->getLocale()) }}">
                            Vakansiyalar
                        </a>
                    </li>
                    <li class="@if(Route::is('contact.'.app()->getLocale())) active @endif">
                        <a href="{{ route('contact.'.app()->getLocale()) }}">
                            Əlaqə
                        </a>
                    </li>
                    <li>
                        <a class="apply mobile-apply" href="{{ route('register.'.app()->getLocale()) }}">
                            <button class="apply-btn">
                                Qeydiyyatdan keç
                                <img src="{{ asset('front/') }}/./img/about-right.png" alt="">
                            </button>
                        </a>
                    </li>
                    <li>
                        <img class="close-icon" src="{{ asset('front/') }}/./img/x-icon.svg" alt="">
                    </li>
                    <span class="mobile-hr"></span>
                    <li class="mobile-numbers">
                        <div class="call-we-numbers">
                            <a href="tel:+994509836699">
                                +994 50 983 66 99
                            </a>
                            <a href="tel:+994509836699">
                                +994 50 983 66 99
                            </a>
                            <a href="+994123101599">
                                +994 12 310 15 99
                            </a>
                        </div>
                    </li>
                </ul>
                <a class="apply" href="{{ route('register.'.app()->getLocale()) }}">
                    <button class="apply-btn">
                        Qeydiyyatdan keç
                        <img src="{{ asset('front/') }}/./img/about-right.png" alt="">
                    </button>
                </a>
                <div class="mobile-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <div class="sticky-buttons">
        <div class="sticky-button">
            <a target=_blank href="https://wa.me/{{ $contact->wp }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <path d="M30.7538 5.23809C29.0952 3.57116 27.1197 2.2495 24.9425 1.3502C22.7652 0.450888 20.4298 -0.00806418 18.0724 0.000107225C8.19497 0.000107225 0.144724 8.01008 0.144724 17.8381C0.144724 20.988 0.976884 24.048 2.53266 26.748L0 36L9.49749 33.516C12.1206 34.938 15.0693 35.694 18.0724 35.694C27.9497 35.694 36 27.684 36 17.8561C36 13.0861 34.1367 8.60408 30.7538 5.23809ZM18.0724 32.67C15.395 32.67 12.7719 31.95 10.4744 30.6L9.93166 30.276L4.28744 31.752L5.78894 26.28L5.42714 25.722C3.93964 23.3586 3.1498 20.6267 3.14774 17.8381C3.14774 9.66608 9.8412 3.0061 18.0543 3.0061C22.0342 3.0061 25.7789 4.55409 28.5829 7.36209C29.9713 8.73722 31.0716 10.3729 31.82 12.1742C32.5684 13.9756 32.95 15.9069 32.9427 17.8561C32.9789 26.028 26.2854 32.67 18.0724 32.67ZM26.2492 21.582C25.797 21.366 23.5899 20.286 23.192 20.124C22.7759 19.98 22.4864 19.908 22.1789 20.34C21.8714 20.79 21.0211 21.798 20.7678 22.086C20.5146 22.392 20.2432 22.428 19.791 22.194C19.3387 21.978 17.8915 21.492 16.191 19.98C14.8523 18.7921 13.9658 17.3341 13.6945 16.8841C13.4412 16.4341 13.6583 16.2001 13.8935 15.9661C14.0925 15.7681 14.3457 15.4441 14.5628 15.1921C14.7799 14.9401 14.8704 14.7421 15.0151 14.4541C15.1598 14.1481 15.0874 13.8961 14.9789 13.6801C14.8703 13.4641 13.9658 11.2681 13.604 10.3681C13.2422 9.50408 12.8623 9.61208 12.591 9.59408H11.7226C11.4151 9.59408 10.9447 9.70208 10.5286 10.1521C10.1307 10.6021 8.97286 11.6821 8.97286 13.8781C8.97286 16.0741 10.5829 18.1981 10.8 18.4861C11.0171 18.7921 13.9658 23.292 18.4523 25.218C19.5196 25.686 20.3518 25.956 21.003 26.154C22.0703 26.496 23.0472 26.442 23.8251 26.334C24.6935 26.208 26.4844 25.254 26.8462 24.21C27.2261 23.166 27.2261 22.284 27.0995 22.086C26.9729 21.888 26.7015 21.798 26.2492 21.582Z" fill="#FF7A00"/>
                </svg>
            </a>
        </div>
        <div class="sticky-button">
            <a href="tel:{{str_replace(' ','',$contact->phone_1)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <path d="M22.76 1C29.56 1 35 6.44 35 13.24M22.76 7.8C25.48 7.8 28.2 10.52 28.2 13.24M1 1C1 24.12 11.88 35 35 35V24.12L25.48 21.4L22.76 25.48C17.32 25.48 10.52 18.68 10.52 13.24L14.6 10.52L11.88 1H1Z" stroke="#FF912B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
        <div class="sticky-button to-top">
            <a href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="17" viewBox="0 0 37 17" fill="none">
                <path d="M34.646 14.5625L20.5236 2.45756C19.5031 1.58286 17.9972 1.58286 16.9768 2.45756L2.85433 14.5625" stroke="#FF7A00" stroke-width="3" stroke-miterlimit="16" stroke-linecap="square"/>
                </svg>
            </a>
        </div>
    </div>