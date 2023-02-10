@extends('front.layouts.master')

@section('meta_description'){{ Str::limit($contact_seo->translate('meta_desc'), 155, '...') }}@endsection

@section('meta_keywords'){{ Str::limit($contact_seo->translate('meta_keyword'), 155, '...') }}@endsection

@section('title'){{ $contact_seo->translate('title') }}@endsection

@section('content')
<section id="page-head">
    <img src="{{ asset('front/') }}/./img/teachers.png" alt="">
    <div class="container">
        <div class="row">
            <h2 class="page-head-text">
                Əlaqə
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
                    Əlaqə
                </li>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumb end-->
<!--contact start-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.5769045191164!2d49.907100215355946!3d40.418222779364925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40306351d4b38089%3A0xb74ef857d0a65d43!2sJED%20Academy!5e0!3m2!1str!2s!4v1674581535791!5m2!1str!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-6">
                <div class="contact-card">
                    <h4 class="contact-head vacancy_head">
                        Əlaqə
                    </h4>
                    <p class="contact-location">
                        <img src="{{ asset('front/') }}/./img/foot-loc.png" alt="">
                       
                        {{ $contact->translate('adress') }}
                    </p>
                    <div class="contact-numbers">
                        <img src="{{ asset('front/') }}/./img/foot-phone.png" alt="">
                        <a href="tel:{{ str_replace(' ','',$contact->phone_1) }}">{{ $contact->phone_1 }}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_2) }}">{{ $contact->phone_2 }}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_3) }}">{{ $contact->phone_3 }}</a>
                    </div>
                    <a class="contact-mail" href="mailTo:info@jedacademy.az">
                        <img src="{{ asset('front/') }}/./img/foot-mail.png" alt="">
                       {{ $contact->email }}
                    </a>
                    <div class="foot-social">
                        <a target="_blank" href="{{ $contact->fb }}">
                            <img src="{{ asset('front/') }}/./img/face-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->ins }}">
                            <img src="{{ asset('front/') }}/./img/insta-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->ln }}">
                            <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                        </a>
                         <a target="_blank" href="https://wa.me/{{ $contact->wp }}">
                            <img src="{{ asset('front/') }}/./img/wp-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{$contact->tg}}">
                            <img src="{{ asset('front') }}/./img/telegram.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->you }}">
                            <img src="{{ asset('front') }}/./img/youtube.png" alt="">
                        </a>
                       
                    </div>
                </div>
                <form class="contact-form" method="POST" action="{{ route('contact_post') }}">
                    @csrf
                    <h4 class="form-head">
                        Biz sizə zəng edək!
                    </h4>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <input type="text" name="name" placeholder="Ad, Soyad">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <input type="text" name="phone" placeholder="Əlaqə nömrəsi">
                    @error('phone')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <textarea name="msj"  id="" cols="30" rows="10" placeholder="Mesajınız"></textarea>
                    @error('msj')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <button>
                        Göndər
                        <img src="{{ asset('front/') }}/./img/Mail-white.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="mobile-contact">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="contact-card">
                    <h4 class="contact-head vacancy_head">
                        Əlaqə
                    </h4>
                    <p class="contact-location">
                        <img src="{{ asset('front/') }}/./img/foot-loc.png" alt="">
                       
                        {{ $contact->translate('adress') }}
                    </p>
                    <div class="contact-numbers">
                        <a href="tel:{{ str_replace(' ','',$contact->phone_1) }}">
                            <img src="{{ asset('front/') }}/./img/foot-phone.png" alt="">
                            {{ $contact->phone_1 }}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_2) }}">
                            <img src="{{ asset('front/') }}/./img/foot-phone.png" alt="">
                            {{ $contact->phone_2 }}</a>
                        <a href="tel:{{ str_replace(' ','',$contact->phone_3) }}">
                            <img src="{{ asset('front/') }}/./img/foot-phone.png" alt="">
                            {{ $contact->phone_3 }}</a>
                    </div>
                    <a class="contact-mail" href="mailTo:{{ $contact->email }}">
                        <img src="{{ asset('front/') }}/./img/foot-mail.png" alt="">
                       {{ $contact->email }}
                    </a>
                    <div class="foot-social">
                        <a target="_blank" href="{{ $contact->fb }}">
                            <img src="{{ asset('front/') }}/./img/face-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->tw }}">
                            <img src="{{ asset('front/') }}/./img/twit-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->ln }}">
                            <img src="{{ asset('front/') }}/./img/linkedin-icon.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->you }}">
                            <img src="{{ asset('front/') }}/./img/youtube.png" alt="">
                        </a>
                        <a target="_blank" href="https://wa.me/{{ $contact->tg }}">
                            <img src="{{ asset('front/') }}/./img/telegram.png" alt="">
                        </a>
                        <a target="_blank" href="{{ $contact->inst }}">
                            <img src="{{ asset('front/') }}/./img/insta-icon.png" alt="">
                        </a>
                        <a target="_blank" href="https://wa.me/{{ $contact->wp }}">
                            <img src="{{ asset('front/') }}/./img/wp-icon.png" alt="">
                        </a>
                    </div>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.570269864268!2d49.90761316535592!3d40.4183697293649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403062915c500001%3A0x92a303d7fd062f48!2sSport%20Plaza%20Hotel%20%26%20Apartments!5e0!3m2!1str!2s!4v1673015151716!5m2!1str!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <form class="contact-form" method="POST" action="{{ route('contact_post') }}">
                    @csrf
                    <h4 class="form-head">
                        Biz sizə zəng edək!
                    </h4>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <input type="text" name="name" placeholder="Ad, Soyad">
                    @error('name')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <input type="text" name="phone" placeholder="Əlaqə nömrəsi">
                    @error('phone')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <textarea name="msj"  id="" cols="30" rows="10" placeholder="Mesajınız"></textarea>
                    @error('msj')
                    <span class="text-danger mt-2">{{ $message }}</span> <br>
                    @enderror
                    <button>
                        Göndər
                        <img src="{{ asset('front/') }}/./img/Mail-white.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--contact end-->
@endsection