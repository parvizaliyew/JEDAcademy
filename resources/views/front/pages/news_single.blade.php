@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($blog->translate('desc'), 155, '...') }}@endsection

@section('title'){{ $blog->translate('title')}}@endsection

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
                        <a href="{{route('blog.'.app()->getLocale())}}">
                            Bloq /
                        </a>
                    </li>
                    <li>
                        {{ $blog->translate('title') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--breadcrumb end-->
    <!--blog single start-->
    <section id="blog-single">
        <div class="container">
            <div class="row">
                <div data-aos="fade-up" class="col-7">
                    <h3 class="blog_head">
                        {{ $blog->translate('title') }}
                    </h3>
                    <div class="blog_show">
                        <p class="blog_date">
                            <img src="{{ asset('front') }}/./img/date.png" alt="">
                            {{ Carbon\Carbon::parse($blog->date)->format('d.m.Y') }}
                        </p>
                        <p class="blog_view">
                            <img src="{{ asset('front') }}/./img/Eye.png" alt="">
                           {{ $blog->seen }}
                        </p>
                    </div>
                    <img src="{{ asset($blog->img) }}" alt="" class="blog_img">
                    <div class="blog_text">
                        {!! $blog->translate('desc') !!}
                    </div>
                </div>
                <div class="col-5">
                    <div data-aos="fade-up" class="blog_cards">
                        @foreach ($blogs as $item)
                        <div class="blog_card">
                            <a href="{{ route('blog_single.'.app()->getLocale(),$item->slug[app()->getLocale()]) }}">
                                <img src="{{ asset($item->img) }}" alt="">
                                <div class="blog_body">
                                    <h4 class="blog_body_head">
                                        {{ $item->translate('title') }}
                                    </h4>
                                    <p class="blog_body_desc">
                                        test
                                    </p>
                                    <p class="blog_body_date">
                                        <img src="{{ asset('front') }}/./img/date.png" alt="">
                                        {{ Carbon\Carbon::parse($item->date)->format('d.m.Y') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                         
                    </div>
                    <div data-aos="fade-up" class="blog_sticky">
                        <div class="foot-social">
                            <h4 class="blog_social_head">
                                Bizi izlə
                            </h4>
                            <a target="_blank" href="{{ $contact->fb }}">
                                <img src="{{ asset('front/') }}/./img/face-icon.png" alt="">
                            </a>
                            <a target="_blank" href="{{ $contact->ins }}">
                                <img src="{{ asset('front/') }}/./img/insta-icon.png" alt="">
                            </a>
                            <a target="_blank" href="{{ $contact->ln }}">
                                <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                            </a>
                            <a target="_blank" href="{{$contact->tg}}">
                                <img src="{{ asset('front') }}/./img/telegram.png" alt="">
                            </a>
                            <a target="_blank" href="{{ $contact->you }}">
                                <img src="{{ asset('front') }}/./img/youtube.png" alt="">
                            </a>
                            <a target="_blank" href="https://wa.me/{{ $contact->wp }}">
                                <img src="{{ asset('front/') }}/./img/wp-icon.png" alt="">
                            </a>
                        </div>
                        <div class="subs_menu">
                            <h4 class="subs_head">
                                ABUNƏ OL
                            </h4>
                            <p class="subs_text">
                                Kampaniyalar və endirimlər barədə xəbərdar olmaq üçün, email büllitenimizə abunə olun 
                            </p>
                            <form method="POST" action="{{route('subscripe_post')}}" class="single-form">
                            @csrf
                                <input type="email" name="email" placeholder="example@gmail.com">
                                <button type="submit">
                                    Göndər
                                    <img src="{{ asset('front') }}/./img/Mail.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection